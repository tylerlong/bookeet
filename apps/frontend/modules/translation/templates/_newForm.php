<?php slot('javascript') ?>
<script language="javascript">
  $(function(){
    $('#translation_description').markItUp(mySettings);
    var prefix='translation_';
    changLanguageLabel(prefix);
    $('#translation_url').tooltip();
  });
</script>
<?php end_slot() ?>

<form action="<?php echo url_for('translation/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <?php echo $form['language_id']->renderRow() ?>
      <?php echo $form['title']->renderRow() ?>
      <?php echo $form['description']->renderRow() ?>
      <?php echo $form['url']->renderRow(array('title' => 'If it exists somewhere else, please give the link. This field is optional.')) ?>
      <?php echo $form->renderHiddenFields() ?>
    </tbody>
  </table>
</form>
