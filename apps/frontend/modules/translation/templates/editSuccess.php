<?php slot('breadcrumb') ?>
<a href="<?php echo url_for('user/index') ?>"><?php echo $sf_user->getName() ?></a>
&gt;&gt; <?php echo $form->getObject() ?>
<?php end_slot() ?>

<h1><?php echo $form->getObject() ?></h1>

<?php include_partial('editForm', array('form' => $form)) ?>
