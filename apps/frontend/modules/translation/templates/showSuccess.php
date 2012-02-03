<?php
$edition = $translation->getEdition();
$book = $edition->getBook();
$chapters = $translation->getChapters();
?>

<?php slot('title') ?>
<?php echo $translation ?>
<?php end_slot() ?>

<?php slot('breadcrumb') ?>
<?php echo $translation ?>
<?php end_slot() ?>

<h1><?php echo $translation ?></h1>

<table>
  <thead>
    <tr>
      <th>Language</th>
      <td><select id="language">
          <?php foreach ($edition->getAllTranslations() as $theTranslation): ?>
            <option value="<?php echo $theTranslation->getLanguage()->getId() ?>" <?php if ($translation->getId() == $theTranslation->getId()): ?>selected="selected"<?php endif ?>>
            <?php echo $theTranslation->getLanguage() ?>
            </option>
          <?php endforeach ?>
            </select>
            <a href="<?php echo url_for('translation/new?id=' . $edition->getId()) ?>"><img src="/images/new.png" alt="add" title="add new"/></a>
          </td>    
          <th>Edition</th>
          <td><select id="edition">
          <?php $tempEditions = $book->getEditions();
              foreach ($tempEditions as $tempEdition): ?>
                <option value="<?php echo $tempEdition->getId() ?>" <?php if ($edition->getId() == $tempEdition->getId()): ?>selected="selected"<?php endif ?>>
            <?php echo $tempEdition->getVersion() ?>
                </option>
          <?php endforeach ?>
                </select>
                <a href="<?php echo url_for('edition/new?id=' . $book->getId()) ?>"><img src="/images/new.png" alt="add" title="add new"/></a>
              </td>
            </tr>
          </thead>
          <tbody>
    <?php if ($translation->getUrl() != null): ?>
                    <tr>
                      <th>External Link:</th>
                      <td colspan="3"><a href="<?php echo url_for("translation/read?id=" . $translation->getId()) ?>">Read</a></td>
                    </tr>
    <?php endif ?>
                    <tr>
                      <td colspan="4"><?php echo $translation->getHtmlDescription() ?></td>
                    </tr>
                  </tbody>
                </table>

<?php if (count($chapters) > 0): ?>
                      <h2>Chapters</h2>
                      <table><tbody>
    <?php foreach ($chapters as $chapter): ?>
                        <tr><td><a href="<?php echo url_for('chapter/show?id=' . $chapter->getId()) ?>"><?php echo $chapter ?></a></td><tr>
      <?php endforeach ?>
                    </tbody></table>
<?php endif ?>

