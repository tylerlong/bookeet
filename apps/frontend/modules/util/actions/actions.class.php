<?php

/**
 * util actions.
 *
 * @package    bookeet
 * @subpackage util
 * @author     Peter Long  http://peterlong.info
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class utilActions extends sfActions {

  public function executeMarkdownPreview(sfWebRequest $request) {
    $markedDown = $request->getPostParameter('data');
    require_once sfConfig::get('sf_lib_dir') . '/util/markdown.php';
    $markedDown = htmlentities($markedDown, ENT_QUOTES, 'UTF-8');
    $this->translated = Markdown($markedDown);
  }

  public function executeTranslate(sfWebRequest $request) {
    $uri = $request->getParameter('uri');
    $b = new sfWebBrowser();
    $b->get($uri);
    $content = substr($b->getResponseText(), 0, 5000);
    $b->post('http://www.google.com/uds/Gtranslate?langpair=en|zh&v=1.0', array('q' => $content));
    $this->result = json_decode($b->getResponseText())->{'responseData'}->{'translatedText'};
    $this->setLayout(false);
  }

  public function executeJsTranslate(sfWebRequest $request){
    
  }
}
