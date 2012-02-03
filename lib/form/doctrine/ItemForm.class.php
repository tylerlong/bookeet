<?php

/**
 * Item form.
 *
 * @package    bookeet
 * @subpackage form
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ItemForm extends BaseItemForm {

  public function configure() {
    unset($this['created_at'], $this['updated_at'], $this['deleted_at'], $this['is_activated']);
  }

}
