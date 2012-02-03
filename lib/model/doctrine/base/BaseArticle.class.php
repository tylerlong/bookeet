<?php

/**
 * BaseArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $description
 * @property string $html_description
 * 
 * @method string  getTitle()            Returns the current record's "title" value
 * @method string  getDescription()      Returns the current record's "description" value
 * @method string  getHtmlDescription()  Returns the current record's "html_description" value
 * @method Article setTitle()            Sets the current record's "title" value
 * @method Article setDescription()      Sets the current record's "description" value
 * @method Article setHtmlDescription()  Sets the current record's "html_description" value
 * 
 * @package    bookeet
 * @subpackage model
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticle extends Item
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('article');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 16383, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 16383,
             ));
        $this->hasColumn('html_description', 'string', 16383, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 16383,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}