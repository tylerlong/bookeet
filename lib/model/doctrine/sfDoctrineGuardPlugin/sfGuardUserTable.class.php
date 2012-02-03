<?php

class sfGuardUserTable extends PluginsfGuardUserTable {

  public static function getInstance() {
    return Doctrine_Core::getTable('sfGuardUser');
  }

  public static function getBooks($userId) {
    $q = Doctrine_Query::create()
                    ->from('Book b')
                    ->where('b.user_id = ?', $userId)
                    ->andWhere('b.deleted_at is null');
    return $q->execute();
  }

  public static function getEditions($userId) {
    $q = Doctrine_Query::create()
                    ->from('Edition e')
                    ->where('e.user_id = ?', $userId)
                    ->andWhere('e.deleted_at is null');
    return $q->execute();
  }

  public static function getTranslations($userId) {
    $q = Doctrine_Query::create()
                    ->from('Translation st')
                    ->where('st.user_id = ?', $userId)
                    ->andWhere('st.deleted_at is null');
    return $q->execute();
  }

}
