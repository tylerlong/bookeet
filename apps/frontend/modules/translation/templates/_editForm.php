<?php slot('javascript') ?>
<script language="javascript">
  $(function(){
    $('#translation_description').markItUp(mySettings);

    var prefix='translation_';
    changLanguageLabel(prefix);

<?php if ($form->getObject()->getEdition()->getBook()->getUser() == $sf_user->getGuardUser() || $sf_user->isSuperAdmin()): ?>
      setEditable('book', 'title', <?php echo $form->getObject()->getEdition()->getBook()->getId() ?>);
      setEditable('book', 'author', <?php echo $form->getObject()->getEdition()->getBook()->getId() ?>);
<?php endif ?>
<?php if ($form->getObject()->getEdition()->getUser() == $sf_user->getGuardUser() || $sf_user->isSuperAdmin()): ?>
        setEditable('edition', 'version', <?php echo $form->getObject()->getEdition()->getId() ?>);
<?php endif ?>
      });
    </script>
<?php end_slot() ?>

    <form action="<?php echo url_for('translation/update?id=' . $form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <input type="hidden" name="sf_method" value="put" />
      <table>
        <thead>
          <tr><th>Book Title</th>
            <td id="book_title"><?php echo $form->getObject()->getEdition()->getBook() ?></td>
          </tr>
          <tr><th>Author</th>
            <td id="book_author"><?php echo $form->getObject()->getEdition()->getBook()->getAuthor() ?></td>
          </tr>
          <tr><th>Edition</th>
            <td id="edition_version"><?php echo $form->getObject()->getEdition()->getVersion() ?></td>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="2">
              <a href="<?php echo url_for('user/index') ?>">Back to list</a>
              <input type="submit" value="Save" />
              <img src="/images/delete.png" alt="delete"/> <a title="Delete" onClick="return confirm('Are your sure?')" href="<?php echo url_for('user/delete?model=Translation&id=' . $form->getObject()->getId()) ?>">delete</a>
            </td>
          </tr>
        </tfoot>
        <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <?php echo $form['language_id']->renderRow() ?>
      <?php echo $form['title']->renderRow() ?>
      <?php echo $form['description']->renderRow() ?>
      <?php echo $form['url']->renderRow() ?>
      <?php echo $form->renderHiddenFields() ?>
    </tbody>
  </table>
</form>
