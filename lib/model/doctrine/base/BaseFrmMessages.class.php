<?php

/**
 * BaseFrmMessages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property FrmTopics $FrmTopics
 * 
 * @method FrmTopics   getFrmTopics() Returns the current record's "FrmTopics" value
 * @method FrmMessages setFrmTopics() Sets the current record's "FrmTopics" value
 * 
 * @package    zt2
 * @subpackage model
 * @author     Optix
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFrmMessages extends MsgMessages
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('FrmTopics', array(
             'local' => 'tid',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}