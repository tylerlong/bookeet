<?php

class BookTable extends Doctrine_Table {

  public static function getInstance() {
    return Doctrine_Core::getTable('Book');
  }

  public static function getList() {
    $q = Bookeet::getActiveQuery('Book', 'b');
    return $q->execute();
  }

  public static function getInactiveEditions($bookId) {
    $q = Bookeet::getInActiveQuery('Edition', 'e')
                    ->andWhere('e.book_id = ?', $bookId);
    return $q->execute();
  }

  public static function getEditions($bookId) {
    $q = Bookeet::getActiveQuery('Edition', 'e')
                    ->andWhere('e.book_id = ?', $bookId);
    return $q->execute();
  }

}
