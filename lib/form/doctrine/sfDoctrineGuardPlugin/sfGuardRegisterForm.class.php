<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm {

  /**
   * @see sfForm
   */
  public function configure() {
    $this->setValidator('first_name', new sfValidatorString(array('min_length' => 3, 'max_length' => 255)));
    $this->setValidator('last_name', new sfValidatorString(array('min_length' => 3, 'max_length' => 255)));
    $this->setValidator('email_address', new sfValidatorEmail(array(), array('invalid' => 'invalid email')));
    $this->setValidator('username', new sfValidatorString(array('min_length' => 3, 'max_length' => 128)));
    $this->setValidator('password', new sfValidatorString(array('min_length' => 6, 'max_length' => 128),
            array('min_length'=>'password is too short (%min_length% characters min).')));
  }

}