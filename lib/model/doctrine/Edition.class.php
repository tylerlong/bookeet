<?php

/**
 * Edition
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    bookeet
 * @subpackage model
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Edition extends BaseEdition {

  public function __toString() {
    if (strcasecmp($this->getVersion(), 'default') === 0)
      return $this->getBook()->__toString();
    return $this->getBook() . ', ' . $this->getVersion() . ' edition';
  }

   public function getAllTranslations() {
    return EditionTable::getAllTranslations($this->getId());
  }

  public function getInactiveTranslations() {
    return EditionTable::getInactiveTranslations($this->getId());
  }

  public function getTranslations() {
    return EditionTable::getTranslations($this->getId());
  }

}
