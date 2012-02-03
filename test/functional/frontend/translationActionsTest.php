<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/translation/index')->

  with('request')->begin()->
    isParameter('module', 'translation')->
    isParameter('action', 'index')->
  end()
;
