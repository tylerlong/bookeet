<?php

/**
 * Language
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    bookeet
 * @subpackage model
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Language extends BaseLanguage {

  public function __toString() {
    return $this->getLocalizedName() == null ? $this->getName() : $this->getLocalizedName();
  }

}