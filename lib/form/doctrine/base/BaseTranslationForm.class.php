<?php

/**
 * Translation form base class.
 *
 * @method Translation getObject() Returns the current form's model object
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTranslationForm extends ArticleForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false));
    $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User')));

    $this->widgetSchema   ['edition_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Edition'), 'add_empty' => false));
    $this->validatorSchema['edition_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Edition')));

    $this->widgetSchema   ['language_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'add_empty' => false));
    $this->validatorSchema['language_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Language')));

    $this->widgetSchema   ['url'] = new sfWidgetFormInputText();
    $this->validatorSchema['url'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

    $this->widgetSchema->setNameFormat('translation[%s]');
  }

  public function getModelName()
  {
    return 'Translation';
  }

}
