<?php

/**
 * Translation filter form base class.
 *
 * @package    bookeet
 * @subpackage filter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTranslationFormFilter extends ArticleFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true));
    $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id'));

    $this->widgetSchema   ['edition_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Edition'), 'add_empty' => true));
    $this->validatorSchema['edition_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Edition'), 'column' => 'id'));

    $this->widgetSchema   ['language_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Language'), 'add_empty' => true));
    $this->validatorSchema['language_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Language'), 'column' => 'id'));

    $this->widgetSchema   ['url'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['url'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('translation_filters[%s]');
  }

  public function getModelName()
  {
    return 'Translation';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'user_id' => 'ForeignKey',
      'edition_id' => 'ForeignKey',
      'language_id' => 'ForeignKey',
      'url' => 'Text',
    ));
  }
}
