<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/section/index')->

  with('request')->begin()->
    isParameter('module', 'section')->
    isParameter('action', 'index')->
  end()
;
