<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/util/index')->

  with('request')->begin()->
    isParameter('module', 'util')->
    isParameter('action', 'index')->
  end();
