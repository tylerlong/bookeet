<?php

/**
 * Chapter form.
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChapterForm extends BaseChapterForm {

  /**
   * @see ArticleForm
   */
  public function configure() {
    parent::configure();
    $this->widgetSchema['translation_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema->setLabel('description', 'Content');
    $this->widgetSchema->setLabel('number', 'Chapter number');
  }

}
