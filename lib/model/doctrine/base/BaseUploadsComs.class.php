<?php

/**
 * BaseUploadsComs
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Uploads $Uploads
 * 
 * @method Uploads     getUploads() Returns the current record's "Uploads" value
 * @method UploadsComs setUploads() Sets the current record's "Uploads" value
 * 
 * @package    zt2
 * @subpackage model
 * @author     Optix
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUploadsComs extends MsgMessages
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Uploads', array(
             'local' => 'upid',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}