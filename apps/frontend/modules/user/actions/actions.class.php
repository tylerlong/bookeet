<?php

/**
 * user actions.
 *
 * @package    bookeet
 * @subpackage user
 * @author     Peter Long  http://peterlong.info
 */
class userActions extends sfActions {

  public function executeIndex(sfWebRequest $request) {
    
  }

  public function executeEdit(sfWebRequest $request) {
    $this->setLayout(false);

    $modelStr = $request->getPostParameter('model');
    if (!($modelStr == 'book' || $modelStr == 'edition')) {
      $this->newValue = 'invalide model name';
      return;
    }

    $id = $request->getPostParameter('id');
    $model = Doctrine::getTable($modelStr)->find(array($id));
    if (!$model) {
      $this->newValue = 'item not found in database';
      return;
    }

    if (!($this->getUser()->getGuardUser() == $model->getUser() || $this->getUser()->isSuperAdmin())) {
      $this->newValue = 'You are not allowed to edit what is not created by you';
      return;
    }

    $field = $request->getPostParameter('field');
    $currentValue = '';
    switch ($field) {
      case 'title':
        $currentValue = $model->getTitle();
        break;
      case 'author':
        $currentValue = $model->getAuthor();
        break;
      case 'version':
        $currentValue = $model->getVersion();
        break;
      default:
        $this->newValue = 'invalid field name';
        return;
    }

    $value = trim($request->getPostParameter('value'));
    if (empty($value)) {
      $this->newValue = $currentValue;
      return;
    }

    switch ($field) {
      case 'title':
        $model->setTitle($value);
        break;
      case 'author':
        $model->setAuthor($value);
        break;
      case 'version':
        $model->setVersion($value);
        break;
      default:
        $this->newValue = 'invalid field name';
        return;
    }
    $model->save();
    $this->newValue = $value;
  }

  public function executeDelete(sfWebRequest $request) {
    $modelStr = $request->getParameter('model');
    $id = $request->getParameter('id');
    $model = Doctrine::getTable($modelStr)->find(array($id));
    $owner = null;
    $redirect = '';
    switch ($modelStr) {
      case 'Chapter':
        $owner = $model->getTranslation()->getUser();
        $redirect = 'user/chapters?id=' . $model->getTranslation()->getId();
        break;
      case 'Section':
        $owner = $model->getChapter()->getTranslation()->getUser();
        $redirect = 'user/sections?id=' . $model->getChapter()->getId();
        break;
      default:
        $owner = $model->getUser();
        $redirect = 'user/index';
    }
    if (!($this->getUser()->getGuardUser() == $owner || $this->getUser()->isSuperAdmin())) {
      $this->getUser()->setFlash('error', 'You are not allowed to delete what is not created by you');
      $this->redirect($redirect);
    }
    Bookeet::trash($model);
    $this->getUser()->setFlash('notice', 'Deleted');
    $this->redirect($redirect);
  }

  public function executeChapters(sfWebRequest $request) {
    $this->translation = Doctrine::getTable('Translation')->find(array($request->getParameter('id')));
    If (!($this->getUser()->getGuardUser() == $this->translation->getUser() || $this->getUser()->isSuperAdmin())) {
      $this->getUser()->setFlash('error', 'You are not allowed to manage what is not created by you');
      $this->redirect('user/index');
    }
    $this->chapters = $this->translation->getChapters();
  }

  public function executeSections(sfWebRequest $request) {
    $this->chapter = Doctrine::getTable('Chapter')->find(array($request->getParameter('id')));
    If (!($this->getUser()->getGuardUser() == $this->chapter->getTranslation()->getUser() || $this->getUser()->isSuperAdmin())) {
      $this->getUser()->setFlash('error', 'You are not allowed to manage what is not created by you');
      $this->redirect('user/index');
    }
    $this->sections = $this->chapter->getSections();
  }

}
