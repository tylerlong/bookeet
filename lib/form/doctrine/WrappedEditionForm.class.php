<?php

/*
 * @author: Peter Long  http://peterlong.info
 */

class WrappedEditionForm extends EditionForm {

  public function configure() {
    parent::configure();

    $translation = new Translation();
    $translation->setUser($this->getOption('user'));
    $translation->Edition = parent::getObject();
    $form = new TranslationForm($translation);
    unset($form['edition_id']);
    
    $this->embedForm('translation', $form);
  }

}
