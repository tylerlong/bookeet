<?php

class TranslationTable extends ArticleTable {

  public static function getList() {
    $q = Bookeet::getActiveQuery('Translation', 't');
    return $q->execute();
  }

  public static function getInstance() {
    return Doctrine_Core::getTable('Translation');
  }

  public static function getTranslation($editionId, $languageId=false) {
    $q = Doctrine_Query::create()->from('Translation t')
                    ->where('t.edition_id = ?', $editionId);
    if ($languageId)
      $q = $q->andWhere('t.language_id = ?', $languageId);
    return $q->fetchOne();
  }

  public static function getChapters($translationId) {
    $q = Bookeet::getActiveQuery('Chapter', 'c')
                    ->andWhere('c.translation_id = ?', $translationId)
                    ->orderBy('c.number');
    return $q->execute();
  }

}