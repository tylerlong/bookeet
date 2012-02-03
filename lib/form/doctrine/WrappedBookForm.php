<?php

/*
 * @author: Peter Long  http://peterlong.info
 */

class WrappedBookForm extends BookForm {

  public function configure() {
    parent::configure();

    $edition = new Edition();
    $edition->Book = parent::getObject();
    $edition->setUser($this->getOption('user'));
    $edition->setVersion('default');
    $form = new WrappedEditionForm($edition,array('user'=>$this->getOption('user')));
    unset($form['book_id']);
    
    $this->embedForm('edition', $form);
  }

}