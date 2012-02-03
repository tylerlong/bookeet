<?php

include(dirname(__FILE__) . '/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
        get('/edition/index')->
        click('Signin', array(
            'signin' => array('username' => 'admin', 'password' => '123456'),
            array('_with_csrf' => true)
        ))->
        with('response')->isRedirected()->
        followRedirect()->
        with('request')->begin()->
        isParameter('module', 'edition')->
        isParameter('action', 'index')->
        end()->
        with('response')->begin()->
        isStatusCode(200)->
        checkElement('body', '!/This is a temporary page/')->
        end()
;
