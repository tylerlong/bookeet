<?php

class SectionTable extends ArticleTable {

  public static function getInstance() {
    return Doctrine_Core::getTable('Section');
  }

  public static function getNext($section) {
    $q = Bookeet::getActiveQuery('Section', 's')
                    ->andWhere('s.chapter_id = ?', $section->getChapterId())
                    ->andWhere('s.number > ?', $section->getNumber())
                    ->orderBy('s.number');
    $next = $q->fetchOne();
    return $next;
  }

   public static function getPrevious($section) {
    $q = Bookeet::getActiveQuery('Section', 's')
                    ->andWhere('s.chapter_id = ?', $section->getChapterId())
                    ->andWhere('s.number < ?', $section->getNumber())
                    ->orderBy('s.number DESC');
    $next = $q->fetchOne();
    return $next;
  }

}