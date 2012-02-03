<?php

/**
 * Article filter form base class.
 *
 * @package    bookeet
 * @subpackage filter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArticleFormFilter extends ItemFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['title'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['title'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['description'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['description'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['html_description'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['html_description'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('article_filters[%s]');
  }

  public function getModelName()
  {
    return 'Article';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'title' => 'Text',
      'description' => 'Text',
      'html_description' => 'Text',
    ));
  }
}
