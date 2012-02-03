<?php

/**
 * chapter actions.
 *
 * @package    bookeet
 * @subpackage chapter
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chapterActions extends sfActions {

  public function executeShow(sfWebRequest $request) {
    $this->chapter = Doctrine::getTable('Chapter')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->chapter);
    $this->next = $this->chapter->getNext();
    $this->previous = $this->chapter->getPrevious();
  }

  public function executeNew(sfWebRequest $request) {
    $translation = Doctrine::getTable('Translation')->find(array($request->getParameter('id')));
    $chapter = new Chapter();
    $chapter->setTranslation($translation);
    $this->form = new ChapterForm($chapter);
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new ChapterForm();
    $success = $this->processForm($request, $this->form);
    if ($success) {
      $this->redirect('user/chapters?id=' . $this->form->getObject()->getTranslationId());
    }
    $translation = Doctrine::getTable('Translation')->find(array($request->getPostParameter('chapter[translation_id]')));
    $this->form->getObject()->setTranslation($translation);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->forward404Unless($chapter = Doctrine::getTable('Chapter')->find(array($request->getParameter('id'))), sprintf('Object chapter does not exist (%s).', $request->getParameter('id')));
    if (!($this->getUser()->getGuardUser() == $chapter->getTranslation()->getUser() || $this->getUser()->isSuperAdmin())) {
      $this->getUser()->setFlash('error', 'You are not allowed to edit what is not created by you');
      $this->redirect('user/index');
    }
    $this->form = new ChapterForm($chapter);
  }

  public function executeUpdate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($chapter = Doctrine::getTable('Chapter')->find(array($request->getParameter('id'))), sprintf('Object chapter does not exist (%s).', $request->getParameter('id')));
    $this->form = new ChapterForm($chapter);
    $success = $this->processForm($request, $this->form);
    if ($success) {
      $this->redirect('user/chapters?id=' . $this->form->getObject()->getTranslationId());
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request) {
    $request->checkCSRFProtection();

    $this->forward404Unless($chapter = Doctrine::getTable('Chapter')->find(array($request->getParameter('id'))), sprintf('Object chapter does not exist (%s).', $request->getParameter('id')));
    $chapter->delete();

    $this->redirect('chapter/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $chapter = $form->save();
      return true;
    }
    return false;
  }

}
