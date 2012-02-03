<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/chapter/index')->

  with('request')->begin()->
    isParameter('module', 'chapter')->
    isParameter('action', 'index')->
  end()
;
