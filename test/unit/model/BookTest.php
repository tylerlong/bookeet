<?php

/*
 * @author: Peter Long  http://peterlong.info
 */
include(dirname(__FILE__) . '/../../bootstrap/Doctrine.php');

$t = new lime_test(1);

$t->comment('->__toString()');
$book = Doctrine_Core::getTable('Book')->createQuery()->fetchOne();
$t->is($book->__toString(), $book->getTitle(), '->__toString() return the title for the book');

