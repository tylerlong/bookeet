<?php

/**
 * Edition form.
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EditionForm extends BaseEditionForm {

  public function configure() {
    parent::configure();
    $this->widgetSchema['book_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
    $this->setValidator('version', new sfValidatorString(array('min_length' => 3, 'max_length' => 255)));
    $this->validatorSchema->setPostValidator(
                        new sfValidatorDoctrineUnique(array('model' => 'Edition',
                            'column' => array('book_id', 'version')),
                                array('invalid' => 'this version arealdy exists'))
    );
  }

}
