<?php

/**
 * BaseNewsComs
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property News $News
 * 
 * @method News     getNews() Returns the current record's "News" value
 * @method NewsComs setNews() Sets the current record's "News" value
 * 
 * @package    zt2
 * @subpackage model
 * @author     Optix
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNewsComs extends MsgMessages
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('News', array(
             'local' => 'nwsid',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}