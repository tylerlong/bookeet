<?php slot('breadcrumb') ?>
<?php echo $sf_user->getName() ?>
<?php end_slot() ?>

<h1><?php echo $sf_user->getName() ?></h1>

<h2>Books contributed by me</h2>
<table>
  <?php $translations = $sf_user->getGuardUser()->getTranslations();
  foreach ($translations as $translation): ?>
    <tr>
      <td>
        <a href="<?php echo url_for('translation/edit?id=' . $translation->getId()) ?>"><?php echo $translation ?></a> <img src="/images/edit.png" alt="edit"/>
      </td>
      <td><a href="<?php echo url_for('translation/show?id=' . $translation->getId()) ?>">Preview</a> <img src="/images/tick.png" alt="preview"/></td>
      <td><a href="<?php echo url_for('user/chapters?id=' . $translation->getId()) ?>">Edit Chapters</a> <img src="/images/edit.png" alt="edit"/></td>
    </tr>
  <?php endforeach ?>
</table>
