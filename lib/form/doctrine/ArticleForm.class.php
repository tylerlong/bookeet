<?php

/**
 * Article form.
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm {

  public function configure() {
    parent::configure();
    unset($this['html_description']);
    $this->setValidator('title', new sfValidatorString(array('min_length' => 3, 'max_length' => 255)));
    $this->setValidator('description', new sfValidatorString(array('min_length' => 127, 'max_length' => 16383)));
  }

}
