<?php

/*
 * @author: Peter Long  http://peterlong.info
 */

require_once(sfConfig::get('sf_plugins_dir') . '/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

class sfGuardAuthActions extends BasesfGuardAuthActions {

  public function executeSignout($request) {
    $this->getUser()->setFlash('notice', 'Signed Out');
    parent::executeSignout($request);
  }

}