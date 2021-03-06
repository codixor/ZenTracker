<?php

/**
 * FrmTopicsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FrmTopicsTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object FrmTopicsTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('FrmTopics');
  }

  /**
   * Returns list of threads in a specific forum
   */
  public function getTopics($f) {
    $q = Doctrine_Query::create()
      ->select('t.*, m.*, mu.username, mu.avatar')
      ->from('FrmTopics t')
      ->leftJoin('t.FrmMessages m') // Getting posts
        ->leftJoin('m.Users mu') // Last poster
      ->where('t.forum = ?', $f)
      ->andWhere('m.created_at = t.updated_at') // Only the last post
      ->orderBy('t.is_important DESC, t.updated_at DESC')
      ->useQueryCache(true)->setQueryCacheLifeSpan(3600*24);
    if (sfContext::getInstance()->getUser()->isAuthenticated())
      $q->addSelect('tu.*')
        ->leftJoin('t.FrmTopicsUsr tu WITH tu.uid = ?', sfContext::getInstance()->getUser()->getAttribute("id"));
    return $q;
  }

  /**
   * Returns list of lastest updated threads of all forums
   */
  public function getLastestUpdatedTopics($l=null) {
    if ($l == null) $l = 10;
    $q = Doctrine_Query::create()
      ->select('t.*, m.*, mu.username, mu.avatar, f.*, c.*')
      ->from('FrmTopics t')
      ->leftJoin('t.FrmForums f')->leftJoin('f.FrmCats c')
      ->leftJoin('t.FrmMessages m') // Getting posts
        ->leftJoin('m.Users mu') // Last poster
      ->andWhere('m.created_at = t.updated_at') // Only the last post
      ->orderBy('t.updated_at DESC')
      ->limit($l);
    if (sfContext::getInstance()->getUser()->isAuthenticated())
      $q->addSelect('tu.*')
        ->leftJoin('t.FrmTopicsUsr tu WITH tu.uid = '.sfContext::getInstance()->getUser()->getAttribute("id"));
    return $q->execute(array(), Doctrine::HYDRATE_ARRAY); 
  }
}