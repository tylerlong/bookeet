<?php

/**
 * edition actions.
 *
 * @package    bookeet
 * @subpackage edition
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class editionActions extends sfActions {

//  get languages list of an edition
   public function executeLanguages(sfWebRequest $request) {
    $edition = Doctrine::getTable('Edition')->find(array($request->getParameter('id')));
    $translations = $edition->getTranslations();
    return $this->renderPartial('edition/languages', array('translations' => $translations));
  }

  public function executeNew(sfWebRequest $request) {
    $book = Doctrine::getTable('Book')->find(array($request->getParameter('id')));
    $edition = new Edition();
    $edition->setBook($book);
    $edition->setUser($this->getUser()->getGuardUser());
    if ($book->getEditions()->count() == 0) {
      $edition->setVersion('default');
    }
    $this->form = new WrappedEditionForm($edition, array('user' => $this->getUser()->getGuardUser()));
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new WrappedEditionForm();
    $success = $this->processForm($request, $this->form);
    if ($success) {
      $translation = $this->form->getObject()->getTranslations()->getFirst();
      Bookeet::unpublish($translation);
      $this->getUser()->setFlash('notice', 'Created and submitted for moderation');
      $this->redirect('user/index');
    }
    $book = Doctrine::getTable('Book')->find(array($request->getPostParameter('edition[book_id]')));
    $this->form->getObject()->setBook($book);
    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $form->save();
      return true;
    }
    return false;
  }

}
