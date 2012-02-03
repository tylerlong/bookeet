<?php

/**
 * Chapter form base class.
 *
 * @method Chapter getObject() Returns the current form's model object
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChapterForm extends ArticleForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['translation_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Translation'), 'add_empty' => false));
    $this->validatorSchema['translation_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Translation')));

    $this->widgetSchema   ['number'] = new sfWidgetFormInputText();
    $this->validatorSchema['number'] = new sfValidatorInteger();

    $this->widgetSchema->setNameFormat('chapter[%s]');
  }

  public function getModelName()
  {
    return 'Chapter';
  }

}
