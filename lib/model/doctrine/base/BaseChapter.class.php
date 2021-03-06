<?php

/**
 * BaseChapter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $translation_id
 * @property integer $number
 * @property Translation $Translation
 * @property Doctrine_Collection $sections
 * 
 * @method integer             getTranslationId()  Returns the current record's "translation_id" value
 * @method integer             getNumber()         Returns the current record's "number" value
 * @method Translation         getTranslation()    Returns the current record's "Translation" value
 * @method Doctrine_Collection getSections()       Returns the current record's "sections" collection
 * @method Chapter             setTranslationId()  Sets the current record's "translation_id" value
 * @method Chapter             setNumber()         Sets the current record's "number" value
 * @method Chapter             setTranslation()    Sets the current record's "Translation" value
 * @method Chapter             setSections()       Sets the current record's "sections" collection
 * 
 * @package    bookeet
 * @subpackage model
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseChapter extends Article
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('chapter');
        $this->hasColumn('translation_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('number', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));


        $this->index('translation_id_title_UNIQUE', array(
             'fields' => 
             array(
              0 => 'translation_id',
              1 => 'title',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Translation', array(
             'local' => 'translation_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Section as sections', array(
             'local' => 'id',
             'foreign' => 'chapter_id'));
    }
}