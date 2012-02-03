<?php

/**
 * Edition form base class.
 *
 * @method Edition getObject() Returns the current form's model object
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEditionForm extends ItemForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false));
    $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User')));

    $this->widgetSchema   ['book_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false));
    $this->validatorSchema['book_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book')));

    $this->widgetSchema   ['version'] = new sfWidgetFormInputText();
    $this->validatorSchema['version'] = new sfValidatorString(array('max_length' => 255));

    $this->widgetSchema->setNameFormat('edition[%s]');
  }

  public function getModelName()
  {
    return 'Edition';
  }

}
