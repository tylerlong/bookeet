<?php

/**
 * Book form.
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BookForm extends BaseBookForm {

  public function configure() {
    parent::configure();
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema->setLabels(array(
        'title' => 'Book Title',
        'description' => 'Introduction'
    ));
    $this->setValidator('title', new sfValidatorString(array('min_length' => 3, 'max_length' => 255)));
    $this->setValidator('author', new sfValidatorString(array('min_length' => 3, 'max_length' => 255)));
    $this->validatorSchema->setPostValidator(
            new sfValidatorDoctrineUnique(array('model' => 'Book',
                'column' => array('title')),
                    array('invalid' => 'this book arealdy exists on bookeet.org'))
    );
  }

}
