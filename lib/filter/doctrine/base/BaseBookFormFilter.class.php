<?php

/**
 * Book filter form base class.
 *
 * @package    bookeet
 * @subpackage filter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBookFormFilter extends ItemFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true));
    $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id'));

    $this->widgetSchema   ['title'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['title'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['author'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['author'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('book_filters[%s]');
  }

  public function getModelName()
  {
    return 'Book';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'user_id' => 'ForeignKey',
      'title' => 'Text',
      'author' => 'Text',
    ));
  }
}
