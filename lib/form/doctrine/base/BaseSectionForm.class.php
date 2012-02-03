<?php

/**
 * Section form base class.
 *
 * @method Section getObject() Returns the current form's model object
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSectionForm extends ArticleForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['chapter_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Chapter'), 'add_empty' => false));
    $this->validatorSchema['chapter_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Chapter')));

    $this->widgetSchema   ['number'] = new sfWidgetFormInputText();
    $this->validatorSchema['number'] = new sfValidatorInteger();

    $this->widgetSchema->setNameFormat('section[%s]');
  }

  public function getModelName()
  {
    return 'Section';
  }

}
