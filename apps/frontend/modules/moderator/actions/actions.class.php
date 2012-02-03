<?php

/**
 * user actions.
 *
 * @package    bookeet
 * @subpackage user
 * @author     Peter Long  http://peterlong.info
 */
class moderatorActions extends sfActions {

  public function executeIndex(sfWebRequest $request) {
    $this->translations = Bookeet::getModerationList('Translation','t');
    $this->chapters = Bookeet::getModerationList('Chapter','c');
    $this->sections = Bookeet::getModerationList('Section','s');
  }

  public function executeDelete(sfWebRequest $request) {
    Bookeet::delete($request->getParameter('model'), $request->getParameter('id'));
    $this->getUser()->setFlash('notice', 'Deleted');
    $this->redirect('moderator/index');
  }

  public function executeApprove(sfWebRequest $request) {
    $model = Doctrine::getTable($request->getParameter('model'))->find(array($request->getParameter('id')));
    $model->setIsActivated(true);
    $model->save();
    $this->getUser()->setFlash('notice', 'Approved');
    $this->redirect('moderator/index');
  }

  public function executeRevert(sfWebRequest $request) {
    $model = Doctrine::getTable($request->getParameter('model'))->find(array($request->getParameter('id')));
    $model->setDeletedAt(null);
    $model->save();
    $this->getUser()->setFlash('notice', 'Reverted');
    $this->redirect('moderator/index');
  }

}
