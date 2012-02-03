<?php use_helper('I18N') ?>
<?php echo __('Hi %first_name%', array('%first_name%' => $user->getFirstName()), 'sf_guard') ?>,<br/><br/>

<?php echo __('Below are your username and new password:') ?><br/><br/>

<?php echo __('Username', null, 'sf_guard') ?>: <?php echo $user->getUsername() ?><br/>
<?php echo __('Password', null, 'sf_guard') ?>: <?php echo $password ?><br/><br/>

Bookeet.org