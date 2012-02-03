<?php


class ArticleTable extends ItemTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Article');
    }
}