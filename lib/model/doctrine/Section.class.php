<?php

/**
 * Section
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    bookeet
 * @subpackage model
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Section extends BaseSection {

  public function __toString() {
    if ($this->getNumber() > 0 && $this->getNumber() < 100 && $this->getChapter()->getNumber() > 0 && $this->getChapter()->getNumber() < 100)
      return 'Section ' . $this->getChapter()->getNumber() . '.' . $this->getNumber() . ' - ' . $this->getTitle();
    else
      return $this->getTitle();
  }

  public function getNext() {
    return SectionTable::getNext($this);
  }

  public function getPrevious() {
    return SectionTable::getPrevious($this);
  }

}