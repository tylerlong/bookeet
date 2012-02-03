<?php foreach ($translations as $translation): ?>
  <option value="<?php echo $translation->getLanguage()->getId() ?>">
  <?php echo $translation->getLanguage() ?>
</option>
<?php endforeach ?>
