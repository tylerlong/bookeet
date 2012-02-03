<?php

/**
 * Book form base class.
 *
 * @method Book getObject() Returns the current form's model object
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookForm extends ItemForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false));
    $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User')));

    $this->widgetSchema   ['title'] = new sfWidgetFormInputText();
    $this->validatorSchema['title'] = new sfValidatorString(array('max_length' => 255));

    $this->widgetSchema   ['author'] = new sfWidgetFormInputText();
    $this->validatorSchema['author'] = new sfValidatorString(array('max_length' => 255));

    $this->widgetSchema->setNameFormat('book[%s]');
  }

  public function getModelName()
  {
    return 'Book';
  }

}
