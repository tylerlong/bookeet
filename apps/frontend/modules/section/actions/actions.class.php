<?php

/**
 * section actions.
 *
 * @package    bookeet
 * @subpackage section
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sectionActions extends sfActions {

  public function executeShow(sfWebRequest $request) {
    $this->section = Doctrine::getTable('Section')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->section);
    $this->next = $this->section->getNext();
    if (!$this->next) {
      $this->chapterNext = $this->section->getChapter()->getNext();
    }
    $this->previous = $this->section->getPrevious();
    if (!$this->previous) {
      $this->chapterPrevious = $this->section->getChapter();
    }
  }

  public function executeNew(sfWebRequest $request) {
    $chapter = Doctrine::getTable('Chapter')->find(array($request->getParameter('id')));
    $section = new Section();
    $section->setChapter($chapter);
    $this->form = new SectionForm($section);
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new SectionForm();
    $success = $this->processForm($request, $this->form);
    if ($success) {
      $this->redirect('user/sections?id=' . $this->form->getObject()->getChapterId());
    }
    $chapter = Doctrine::getTable('Chapter')->find(array($request->getPostParameter('section[chapter_id]')));
    $this->form->getObject()->setChapter($chapter);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->forward404Unless($section = Doctrine::getTable('Section')->find(array($request->getParameter('id'))), sprintf('Object section does not exist (%s).', $request->getParameter('id')));
    if (!($this->getUser()->getGuardUser() == $section->getChapter()->getTranslation()->getUser() || $this->getUser()->isSuperAdmin())) {
      $this->getUser()->setFlash('error', 'You are not allowed to edit what is not created by you');
      $this->redirect('user/index');
    }
    $this->form = new SectionForm($section);
  }

  public function executeUpdate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($section = Doctrine::getTable('Section')->find(array($request->getParameter('id'))), sprintf('Object section does not exist (%s).', $request->getParameter('id')));
    $this->form = new SectionForm($section);
    $success = $this->processForm($request, $this->form);
    if ($success) {
      $this->redirect('user/sections?id=' . $this->form->getObject()->getChapterId());
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request) {
    $request->checkCSRFProtection();

    $this->forward404Unless($section = Doctrine::getTable('Section')->find(array($request->getParameter('id'))), sprintf('Object section does not exist (%s).', $request->getParameter('id')));
    $section->delete();

    $this->redirect('section/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $section = $form->save();
      return true;
    }
    return false;
  }

}
