<?php

/**
 * book actions.
 *
 * @package    bookeet
 * @subpackage book
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookActions extends sfActions {

  public function executeNew(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::GET));
    $book = new Book();
    $book->setUser($this->getUser()->getGuardUser());
    $this->form = new WrappedBookForm($book, array('user' => $this->getUser()->getGuardUser()));
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new WrappedBookForm();
    $success = $this->processForm($request, $this->form);
    if ($success) {
      $translation = $this->form->getObject()->getEditions()->getFirst()->getTranslations()->getFirst();
      Bookeet::unpublish($translation);
      $this->getUser()->setFlash('notice', 'Created and submitted for moderation');
      $this->redirect('user/index');
    }
    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $formValues = $request->getParameter($form->getName());
    $formValues['edition']['version'] = 'default';
    $formValues['edition']['translation']['title'] = $formValues['title'];
    $form->bind($formValues, $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $book = $form->save();
      return true;
    }
    return false;
  }

}
