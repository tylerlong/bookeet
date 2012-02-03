<?php

/* *
 *
 * Bookeet Utility Class
 * @author: Peter Long  http://peterlong.info
 */

class Bookeet {

  public static function getInActiveQuery($model, $alias) {
    $q = Doctrine_Query::create()->from($model . ' ' . $alias)
                    ->where($alias . '.is_activated = false')
                    ->orWhere($alias . '.deleted_at is not null');
    return $q;
  }

  public static function getActiveQuery($model, $alias) {
    $q = Doctrine_Query::create()->from($model . ' ' . $alias)
                    ->where($alias . '.is_activated = true')
                    ->andWhere($alias . '.deleted_at is null');
    return $q;
  }

  public static function getModerationList($model, $alias) {
    $q=  Bookeet::getInActiveQuery($model, $alias);
    return $q->execute();
  }

  public static function publish($model) {
    $model->setIsActivated(true);
    $model->save();
  }

  public static function unPublish($model) {
    $model->setIsActivated(false);
    $model->save();
  }

  public static function trash($model) {
    $model->setDeletedAt(Date());
    $model->save();
  }

  public static function delete($model, $id) {
    $q = Doctrine_Query::create()
                    ->delete($model . ' a')
                    ->where('a.id = ?', $id);
    return $q->execute();
  }

}
