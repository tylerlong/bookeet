<?php slot('javascript') ?>
<script language="javascript">
  $(function(){
    $('#section_description').markItUp(mySettings);
  });
</script>
<?php end_slot() ?>

<form action="<?php echo url_for('section/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />  
  <?php endif; ?>
    <table>
      <tfoot>
        <tr>
          <td colspan="2">
            <a href="<?php echo url_for('user/sections?id=' . $form->getObject()->getChapterId()) ?>">Back to list</a>
            <input type="submit" value="Save" />
          <?php if (!$form->getObject()->isNew()): ?>
            <img src="/images/delete.png" alt="delete"/> <a title="Delete" onClick="return confirm('Are your sure?')" href="<?php echo url_for('user/delete?model=Section&id=' . $form->getObject()->getId()) ?>">delete</a>
          <?php endif ?>
          </td>
        </tr>
      </tfoot>
      <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <?php echo $form['number']->renderRow() ?>
      <?php echo $form['title']->renderRow() ?>
      <?php echo $form['description']->renderRow() ?>
      <?php echo $form->renderHiddenFields() ?>
    </tbody>
  </table>
</form>
