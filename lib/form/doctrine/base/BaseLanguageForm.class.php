<?php

/**
 * Language form base class.
 *
 * @method Language getObject() Returns the current form's model object
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLanguageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'code'           => new sfWidgetFormInputText(),
      'name'           => new sfWidgetFormInputText(),
      'localized_name' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'           => new sfValidatorString(array('max_length' => 2)),
      'name'           => new sfValidatorString(array('max_length' => 63)),
      'localized_name' => new sfValidatorString(array('max_length' => 63)),
      'created_at'     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Language', 'column' => array('code'))),
        new sfValidatorDoctrineUnique(array('model' => 'Language', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Language', 'column' => array('localized_name'))),
      ))
    );

    $this->widgetSchema->setNameFormat('language[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Language';
  }

}
