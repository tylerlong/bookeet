<?php slot('javascript') ?>
<script language="javascript">
  $(function(){
    $('#book_edition_translation_description').markItUp(mySettings);
    $('#book_edition_translation_url').tooltip();
  });
</script>
<?php end_slot() ?>

<form action="<?php echo url_for('book/create') ?>" method="post">
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
      <?php echo $form['title']->renderRow() ?>
      <?php echo $form['author']->renderRow() ?>
      <?php echo $form['edition']['translation']['language_id']->renderRow() ?>
      <?php echo $form['edition']['translation']['description']->renderRow() ?>
      <?php echo $form['edition']['translation']['url']->renderRow(array('title' => 'If it exists somewhere else, please give the link. This field is optional.')) ?>
      <?php echo $form->renderHiddenFields() ?>
    </tbody>
  </table>
</form>
