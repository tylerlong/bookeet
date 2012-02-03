<?php
$translation = $chapter->getTranslation();
?>

<?php slot('breadcrumb') ?>
<a href="<?php echo url_for('user/index') ?>"><?php echo $sf_user->getName() ?></a>
&gt;&gt; <a href="<?php echo url_for('user/chapters?id=' . $translation->getId()) ?>"><?php echo $translation ?></a>
&gt;&gt; <?php echo $chapter ?>
<?php end_slot() ?>

<h1><?php echo $chapter ?></h1>
<h2>Sections</h2>

<table>
  <tbody>
    <?php foreach ($sections as $section): ?>
      <tr>
        <td><a href="<?php echo url_for('section/edit?id=' . $section->getId()) ?>"><?php echo $section ?></a> <img src="/images/edit.png" alt="edit"/></td>
        <td><a href="<?php echo url_for('section/show?id=' . $section->getId()) ?>">Preview</a> <img src="/images/tick.png" alt="preview"/></td>
      </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr><td colspan="2">
          <img src="/images/new.png" alt="new"/><a href="<?php echo url_for('section/new?id=' . $chapter->getId()) ?>">Add a new section</a>
      </td></tr>
  </tfoot>
</table>