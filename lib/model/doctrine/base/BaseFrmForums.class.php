<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FrmForums', 'doctrine');

/**
 * BaseFrmForums
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cat
 * @property string $name
 * @property string $description
 * @property string $minroleread
 * @property integer $minlevelread
 * @property string $minrolewrite
 * @property integer $minlevelwrite
 * @property FrmCats $FrmCats
 * @property Doctrine_Collection $FrmTopics
 * 
 * @method integer             getCat()           Returns the current record's "cat" value
 * @method string              getName()          Returns the current record's "name" value
 * @method string              getDescription()   Returns the current record's "description" value
 * @method string              getMinroleread()   Returns the current record's "minroleread" value
 * @method integer             getMinlevelread()  Returns the current record's "minlevelread" value
 * @method string              getMinrolewrite()  Returns the current record's "minrolewrite" value
 * @method integer             getMinlevelwrite() Returns the current record's "minlevelwrite" value
 * @method FrmCats             getFrmCats()       Returns the current record's "FrmCats" value
 * @method Doctrine_Collection getFrmTopics()     Returns the current record's "FrmTopics" collection
 * @method FrmForums           setCat()           Sets the current record's "cat" value
 * @method FrmForums           setName()          Sets the current record's "name" value
 * @method FrmForums           setDescription()   Sets the current record's "description" value
 * @method FrmForums           setMinroleread()   Sets the current record's "minroleread" value
 * @method FrmForums           setMinlevelread()  Sets the current record's "minlevelread" value
 * @method FrmForums           setMinrolewrite()  Sets the current record's "minrolewrite" value
 * @method FrmForums           setMinlevelwrite() Sets the current record's "minlevelwrite" value
 * @method FrmForums           setFrmCats()       Sets the current record's "FrmCats" value
 * @method FrmForums           setFrmTopics()     Sets the current record's "FrmTopics" collection
 * 
 * @package    zt2
 * @subpackage model
 * @author     Optix
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFrmForums extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('frm_forums');
        $this->hasColumn('cat', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 60, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 60,
             ));
        $this->hasColumn('description', 'string', 140, array(
             'type' => 'string',
             'length' => 140,
             ));
        $this->hasColumn('minroleread', 'string', 3, array(
             'type' => 'string',
             'length' => 3,
             ));
        $this->hasColumn('minlevelread', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('minrolewrite', 'string', 3, array(
             'type' => 'string',
             'length' => 3,
             ));
        $this->hasColumn('minlevelwrite', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('FrmCats', array(
             'local' => 'cat',
             'foreign' => 'id'));

        $this->hasMany('FrmTopics', array(
             'local' => 'id',
             'foreign' => 'forum'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}