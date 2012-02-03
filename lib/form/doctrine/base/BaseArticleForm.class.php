<?php

/**
 * Article form base class.
 *
 * @method Article getObject() Returns the current form's model object
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArticleForm extends ItemForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['title'] = new sfWidgetFormInputText();
    $this->validatorSchema['title'] = new sfValidatorString(array('max_length' => 255));

    $this->widgetSchema   ['description'] = new sfWidgetFormTextarea();
    $this->validatorSchema['description'] = new sfValidatorString(array('max_length' => 16383));

    $this->widgetSchema   ['html_description'] = new sfWidgetFormTextarea();
    $this->validatorSchema['html_description'] = new sfValidatorString(array('max_length' => 16383, 'required' => false));

    $this->widgetSchema->setNameFormat('article[%s]');
  }

  public function getModelName()
  {
    return 'Article';
  }

}
