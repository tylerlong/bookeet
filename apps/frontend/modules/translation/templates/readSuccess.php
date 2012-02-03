<?php
$edition = $translation->getEdition();
$book = $edition->getBook();
?>

<?php slot('title') ?>
<?php echo $translation ?>
<?php end_slot() ?>

<?php slot('toolbar_text') ?>
<?php echo $book ?> -
<select id="edition">
  <?php
  $tempEditions = $book->getEditions();
  foreach ($tempEditions as $tempEdition): ?>
    <option value="<?php echo $tempEdition->getId() ?>" <?php if ($edition->getId() == $tempEdition->getId()): ?>selected="selected"<?php endif; ?>>
    <?php echo $tempEdition->getVersion() ?>
    </option>
  <?php endforeach ?>
    </select> edition in
    <select id="language">
  <?php $tempTranslations = $edition->getTranslations();
      foreach ($tempTranslations as $tempTranslation): ?>
        <option value="<?php echo $tempTranslation->getLanguage()->getId() ?>" <?php if ($translation->getId() == $tempTranslation->getId()): ?>selected="selected"<?php endif; ?>>
    <?php echo $tempTranslation->getLanguage() ?>
        </option>
  <?php endforeach ?>
        </select>
        <button id="btn">Go</button>
<?php end_slot() ?>

          <iframe id="content" src="<?php
          if ($translation->getUrl()) {
            echo $translation->getUrl();
          } else {
            echo url_for('translation/show?id=' . $translation->getId(), true);
          }
?>"/>
