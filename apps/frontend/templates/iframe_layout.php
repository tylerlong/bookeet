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
    </head>
    <body>
      <div class="toolbar">
        <a href="/"><img src="/images/logo.png" alt="Bookeet.org"/></a>
        <span class="txt"><?php include_slot('toolbar_text', '') ?></span>
      </div>
    <?php echo $sf_content ?>
  </body>
</html>
