<?php

require_once(sfConfig::get('sf_plugins_dir') . '/sfDoctrineGuardPlugin/modules/sfGuardForgotPassword/lib/BasesfGuardForgotPasswordActions.class.php');

/**
 * sfGuardForgotPassword actions.
 * 
 * @package    sfGuardForgotPasswordPlugin
 * @subpackage sfGuardForgotPassword
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class sfGuardForgotPasswordActions extends BasesfGuardForgotPasswordActions {

  public function executeChange($request) {
    $this->forgotPassword = $this->getRoute()->getObject();
    $this->user = $this->forgotPassword->User;
    $this->form = new sfGuardChangeUserPasswordForm($this->user);

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid()) {
        $this->form->save();

        $this->_deleteOldUserForgotPasswordRecords();

        $message = Swift_Message::newInstance()
                        ->setFrom(sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'))
                        ->setTo($this->user->email_address)
                        ->setSubject('New Password for ' . $this->user->username)
                        ->setBody($this->getPartial('sfGuardForgotPassword/new_password', array('user' => $this->user, 'password' => $request['sf_guard_user']['password'])))
                        ->setContentType('text/html')
        ;

        $this->getMailer()->send($message);

        $this->getUser()->setFlash('notice', 'Password updated successfully!');
        $this->redirect('@sf_guard_signin');
      }
    }
  }

  private function _deleteOldUserForgotPasswordRecords() {
    Doctrine_Core::getTable('sfGuardForgotPassword')
            ->createQuery('p')
            ->delete()
            ->where('p.user_id = ?', $this->user->id)
            ->execute();
  }

}
