<?php

/**
 * static actions.
 *
 * @package    bookeet
 * @subpackage static
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SiteActions extends sfActions {

  public function executeContribute(sfWebRequest $request) {
    
  }

  public function executeAbout(sfWebRequest $request) {

  }

  public function executeFeedback(sfWebRequest $request) {

  }

  public function executeHome(sfWebRequest $request) {
    $this->translations = Doctrine::getTable('Translation')->getList();
  }

}
