<?php

/**
 * Section filter form base class.
 *
 * @package    bookeet
 * @subpackage filter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSectionFormFilter extends ArticleFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['chapter_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Chapter'), 'add_empty' => true));
    $this->validatorSchema['chapter_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Chapter'), 'column' => 'id'));

    $this->widgetSchema   ['number'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['number'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));

    $this->widgetSchema->setNameFormat('section_filters[%s]');
  }

  public function getModelName()
  {
    return 'Section';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'chapter_id' => 'ForeignKey',
      'number' => 'Number',
    ));
  }
}
