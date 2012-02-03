<?php

class EditionTable extends Doctrine_Table {

  public static function getInstance() {
    return Doctrine_Core::getTable('Edition');
  }

  public static function getAllTranslations($editionId) {
    $q = Doctrine_Query::create()->from('Translation t')
            ->andWhere('t.edition_id = ?', $editionId);
    return $q->execute();
  }

  public static function getInactiveTranslations($editionId) {
    $q = Bookeet::getInActiveQuery('Translation', 't')
                    ->andWhere('t.edition_id = ?', $editionId);
    return $q->execute();
  }

  public static function getTranslations($editionId) {
    $q = Bookeet::getActiveQuery('Translation', 't')
                    ->andWhere('t.edition_id = ?', $editionId);
    return $q->execute();
  }

}