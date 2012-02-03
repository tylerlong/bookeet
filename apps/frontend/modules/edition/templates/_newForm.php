<?php slot('javascript') ?>
<script language="javascript">
  $(function(){
    $('#edition_translation_description').markItUp(mySettings);
    var prefix='edition_translation_';
    changLanguageLabel(prefix);
    $('#edition_translation_url').tooltip();
  });
</script>
<?php end_slot() ?>

<form action="<?php echo url_for('edition/create') ?>" method="post">
  <table>
    <thead>
      <tr><th>Book</th><td><?php echo $form->getObject()->getBook() ?></td></tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <?php echo $form['version']->renderRow() ?>

      <?php echo $form['translation']['language_id']->renderRow() ?>
      <?php echo $form['translation']['title']->renderRow() ?>
      <?php echo $form['translation']['description']->renderRow() ?>
      <?php echo $form['translation']['url']->renderRow(array('title' => 'If it exists somewhere else, please give the link. This field is optional.')) ?>

      <?php echo $form->renderHiddenFields() ?>
    </tbody>
  </table>
</form>
