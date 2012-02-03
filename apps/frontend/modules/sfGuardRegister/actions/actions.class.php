<?php

/*
 * @author: Peter Long  http://peterlong.info
 */

require_once(sfConfig::get('sf_plugins_dir') . '/sfDoctrineGuardPlugin/modules/sfGuardRegister/lib/BasesfGuardRegisterActions.class.php');

class sfGuardRegisterActions extends BasesfGuardRegisterActions {

  public function executeIndex(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      $this->getUser()->setFlash('notice', 'You are already registered and signed in!');
      $this->redirect('@homepage');
    }

    $this->form = new sfGuardRegisterForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid()) {
        $user = $this->form->save();
        $user->addGroupByName('user');
        $this->getUser()->signIn($user);
        $this->redirect('@homepage');
      }
    }
  }

}
