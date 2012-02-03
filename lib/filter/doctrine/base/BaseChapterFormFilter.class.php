<?php

/**
 * Chapter filter form base class.
 *
 * @package    bookeet
 * @subpackage filter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChapterFormFilter extends ArticleFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['translation_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Translation'), 'add_empty' => true));
    $this->validatorSchema['translation_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Translation'), 'column' => 'id'));

    $this->widgetSchema   ['number'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['number'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));

    $this->widgetSchema->setNameFormat('chapter_filters[%s]');
  }

  public function getModelName()
  {
    return 'Chapter';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'translation_id' => 'ForeignKey',
      'number' => 'Number',
    ));
  }
}
