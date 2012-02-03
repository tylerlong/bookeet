<?php

/**
 * Edition filter form base class.
 *
 * @package    bookeet
 * @subpackage filter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEditionFormFilter extends ItemFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true));
    $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id'));

    $this->widgetSchema   ['book_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => true));
    $this->validatorSchema['book_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Book'), 'column' => 'id'));

    $this->widgetSchema   ['version'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['version'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('edition_filters[%s]');
  }

  public function getModelName()
  {
    return 'Edition';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'user_id' => 'ForeignKey',
      'book_id' => 'ForeignKey',
      'version' => 'Text',
    ));
  }
}
