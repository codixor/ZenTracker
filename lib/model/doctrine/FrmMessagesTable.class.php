<?php

/**
 * FrmMessagesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FrmMessagesTable extends MsgMessagesTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object FrmMessagesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FrmMessages');
    }
}