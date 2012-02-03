<?php

/**
 * Language filter form base class.
 *
 * @package    bookeet
 * @subpackage filter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLanguageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'localized_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'code'           => new sfValidatorPass(array('required' => false)),
      'name'           => new sfValidatorPass(array('required' => false)),
      'localized_name' => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('language_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Language';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'code'           => 'Text',
      'name'           => 'Text',
      'localized_name' => 'Text',
      'created_at'     => 'Date',
    );
  }
}
