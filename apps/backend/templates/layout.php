<!DOCTYPE html>
<html>
  <head>
    <?php include_stylesheets() ?>
    <title>
      <?php include_slot('title', 'Bookeet Administration Interface') ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <div class="container">
      <div class="header">
        <a href="/">
          <img src="/images/logo.png" alt="Bookeet" class="ml10010 mt50"/>
        </a>
      </div>
      <div class="menu">
        <ul>
          <li>
            <?php echo link_to('Books', 'book') ?>
          </li>
          <li>
            <?php echo link_to('Editions', 'edition') ?>
          </li>
          <li>
            <?php echo link_to('Translations', 'translation') ?>
          </li>
          <li>
            <?php echo link_to('Languages', 'language') ?>
          </li>
          <li>
            |
          </li>
          <li>
            <?php echo link_to('Users', 'sf_guard_user') ?>
          </li>
          <li>
            <?php echo link_to('Groups', 'sf_guard_group') ?>
          </li>
          <li>
            <?php echo link_to('Permissions', 'sf_guard_permission') ?>
          </li>
          <li>
            |
          </li>
          <li>
            <?php echo link_to('Logout', 'sf_guard_signout') ?>
          </li>
        </ul>
      </div>
      <div class="main">
          <?php echo $sf_content ?>
      </div>
      <div class="footer mt50">
        <div class="ct  w10080">
          <a href="/frontend_dev.php">Frontend</a>
        </div>
      </div>
    </div>
  </body>
</html>
