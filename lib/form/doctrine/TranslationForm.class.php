<?php

/**
 * Translation form.
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TranslationForm extends BaseTranslationForm {

  public function configure() {
    parent::configure();
    $this->widgetSchema['edition_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema->setLabel('url', 'External Link');
    $this->setValidator('url', new sfValidatorUrl(array('required' => false), array('invalid' => 'invalid url')));
    $this->validatorSchema->setPostValidator(new sfValidatorAnd(
                    array(
                        new sfValidatorDoctrineUnique(array('model' => 'Translation',
                            'column' => array('edition_id', 'language_id')),
                                array('invalid' => 'this translation already exists on bookeet.org')),
                         new sfValidatorDoctrineUnique(array('model' => 'Translation',
                            'column' => array('url')), array('invalid' => 'this url arealdy exists on bookeet.org'))
                    )
    ));
  }

}
