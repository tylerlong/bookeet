<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php include_stylesheets() ?>
    <title>
      <?php include_slot('title', 'Bookeet - Discover and Share free e-books') ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php if (has_slot('javascript')): ?>
    <?php include_slot('javascript') ?>
    <?php endif ?>
      </head>
      <body>
        <div class="container">
          <div class="header">
            <a href="/">
              <img src="/images/logo.png" alt="Bookeet.org" class="ml10010 mt50"/>
            </a>
          </div>
          <div class="main">
            <div class="lt w10015 mr10005">
              <div class="coolmenu">
                <a href="<?php echo url_for('@homepage') ?>">Home</a>
                <a href="<?php echo url_for('book/new') ?>">Share a Book</a>
            <?php if ($sf_user->isAuthenticated()): ?>
              <a href="<?php echo url_for('user/index') ?>"><img src="/images/user.png" alt="user"/> <?php echo $sf_user->getName() ?></a>
            <?php if ($sf_user->hasCredential('moderator')): ?>
                <a href="<?php echo url_for('moderator/index') ?>">Moderation</a>
            <?php endif ?>
            <?php echo link_to('Log out', '@sf_guard_signout') ?>
            <?php else: ?>
            <?php echo link_to('Log in', '@sf_guard_signin') ?>
            <?php echo link_to('Register', '@sf_guard_register') ?>
            <?php endif ?>
                </div>
              </div>
              <div class="rt w10075 mt10 mr50 mb50">
          <?php if (sfContext::getInstance()->getRouting()->getCurrentRouteName() != 'homepage'): ?>
          <?php if (has_slot('breadcrumb')): ?>
                      <a href="/">Home</a> &gt;&gt; <?php include_slot('breadcrumb') ?>
          <?php endif ?>
          <?php endif ?>
          <?php if ($sf_user->hasFlash('notice')): ?>
                        <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
          <?php endif ?>

          <?php if ($sf_user->hasFlash('error')): ?>
                          <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
          <?php endif ?>
          <?php echo $sf_content ?>
                        </div>
                      </div>
                      <div class="footer">
                        <div class="ct w10080">
                          <a href="<?php echo url_for('site/about') ?>">About</a> |
                          <a href="http://code.google.com/p/bookeet/" target="_blank">Project</a> |
                          <a href="<?php echo url_for('site/contribute') ?>">Contribute</a> |
                          <a href="<?php echo url_for('site/feedback') ?>">Feedback</a>
          <div class="rt">
            powered by <a href="http://www.symfony-project.org" target="_blank">
              <img src="/images/symfony.gif" alt="symfony framework"/>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
