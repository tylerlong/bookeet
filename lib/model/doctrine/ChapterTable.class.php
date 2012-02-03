<?php

class ChapterTable extends ArticleTable {

  public static function getInstance() {
    return Doctrine_Core::getTable('Chapter');
  }

  public static function getSections($chapterId) {
    $q = Bookeet::getActiveQuery('Section', 's')
                    ->andWhere('s.chapter_id = ?', $chapterId)
                    ->orderBy('s.number');
    return $q->execute();
  }

  public static function getNext($chapter) {
    $q = Bookeet::getActiveQuery('Chapter', 'c')
                    ->andWhere('c.translation_id = ?', $chapter->getTranslationId())
                    ->andWhere('c.number > ?', $chapter->getNumber())
                    ->orderBy('c.number');
    return $q->fetchOne();
  }

   public static function getPrevious($chapter) {
    $q = Bookeet::getActiveQuery('Chapter', 'c')
                    ->andWhere('c.translation_id = ?', $chapter->getTranslationId())
                    ->andWhere('c.number < ?', $chapter->getNumber())
                    ->orderBy('c.number DESC');
    return $q->fetchOne();
  }

}