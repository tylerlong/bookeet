<?php slot('title') ?>
<?php echo $chapter ?>
<?php end_slot() ?>

<?php
$translation = $chapter->getTranslation();
?>

<?php slot('breadcrumb') ?>
<a href="<?php echo url_for('translation/show?id=') . $translation->getId() ?>"><?php echo $translation ?></a>
&gt;&gt; <?php echo $chapter ?>
<?php end_slot() ?>

<h1><?php echo $chapter ?></h1>

<?php echo $chapter->getHtmlDescription() ?>

<?php
$sections = $chapter->getSections();
if (count($sections) > 0):
?>
  <h2>Sections</h2>
  <table><tbody>
    <?php foreach ($sections as $section): ?>
      <tr><td><a href="<?php echo url_for('section/show?id=' . $section->getId()) ?>"><?php echo $section ?></a></td></tr>
    <?php endforeach ?>
    </tbody></table>
<?php endif ?>

      <br/>
<?php if ($previous): ?>
        <div class="fl">
          &lt;&lt; <a href="<?php echo url_for('chapter/show?id=' . $previous->getId()) ?>"><?php echo $previous ?></a>
        </div>
<?php endif ?>
<?php if ($next): ?>
          <div class="fr">
            <a href="<?php echo url_for('chapter/show?id=' . $next->getId()) ?>"><?php echo $next ?></a> &gt;&gt;
          </div>
<?php endif ?>
