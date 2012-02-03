<?php

/**
 * translation actions.
 *
 * @package    bookeet
 * @subpackage translation
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class translationActions extends sfActions {

  public function executeRead(sfWebRequest $request) {
    $this->translation = Doctrine::getTable('translation')->find($request->getParameter('id'));
    $this->forward404Unless($this->translation);
  }

  public function executeId(sfWebRequest $request) {
    $editionId = $request->getParameter('edition');
    $languageId = $request->getParameter('language');
    $translation = translationTable::getTranslation($editionId, $languageId);
    if (!$translation)//languageId no found, use the default one.
      $translation = translationTable::getTranslation($editionId);
    return $this->renderText($translation->getId());
  }

  public function executeUrl(sfWebRequest $request) {
    $editionId = $request->getParameter('edition');
    $languageId = $request->getParameter('language');
    $translation = translationTable::getTranslation($editionId, $languageId);
    if (!$translation)//languageId no found, use the default one.
      $translation = translationTable::getTranslation($editionId);
    $url = $translation->getUrl();
    if (!$url) {//url field is null
      $uri = 'translation/show?id=' . $translation->getId();
      $url = $this->getController()->genUrl($uri, true);
    }
    return $this->renderText($url);
  }

  public function executeShow(sfWebRequest $request) {
    $this->translation = Doctrine::getTable('translation')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->translation);
  }

  public function executeNew(sfWebRequest $request) {
    $edition = Doctrine::getTable('Edition')->find(array($request->getParameter('id')));
    $translation = new translation();
    $translation->setEdition($edition);
    $translation->setUser($this->getUser()->getGuardUser());
    if ($edition->gettranslations()->count() == 0) {
      $translation->setTitle($edition->__toString());
    }
    $this->form = new translationForm($translation);
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new translationForm();
    $success = $this->processForm($request, $this->form);
    if ($success) {
      Bookeet::unPublish($this->form->getObject());
      $this->getUser()->setFlash('notice', 'Created and submitted for moderation');
      $this->redirect('translation/show?id=' . $this->form->getObject()->getId());
    }
    $edition = Doctrine::getTable('Edition')->find(array($request->getPostParameter('translation[edition_id]')));
    $this->form->getObject()->setEdition($edition);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->forward404Unless($translation = Doctrine::getTable('translation')->find(array($request->getParameter('id'))), sprintf('Object translation does not exist (%s).', $request->getParameter('id')));
    if (!($this->getUser()->getGuardUser() == $translation->getUser() || $this->getUser()->isSuperAdmin())) {
      $this->getUser()->setFlash('error', 'You are not allowed to edit what is not created by you');
      $this->redirect('user/index');
    }
    $this->form = new translationForm($translation);
  }

  public function executeUpdate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($translation = Doctrine::getTable('translation')->find(array($request->getParameter('id'))), sprintf('Object translation does not exist (%s).', $request->getParameter('id')));
    $this->form = new translationForm($translation);
    $success = $this->processForm($request, $this->form);
    if ($success) {
      $this->getUser()->setFlash('notice', 'Saved');
      $this->redirect('translation/show?id=' . $this->form->getObject()->getId());
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request) {
    $request->checkCSRFProtection();

    $this->forward404Unless($translation = Doctrine::getTable('translation')->find(array($request->getParameter('id'))), sprintf('Object translation does not exist (%s).', $request->getParameter('id')));
    $translation->delete();

    $this->redirect('translation/index');
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
