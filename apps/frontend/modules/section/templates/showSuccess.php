<?php slot('title') ?>
<?php echo $section ?>
<?php end_slot() ?>

<?php
$chapter = $section->getChapter();
$translation = $chapter->getTranslation();
?>

<?php slot('breadcrumb') ?>
<a href="<?php echo url_for('translation/show?id=') . $translation->getId() ?>"><?php echo $translation ?></a>
&gt;&gt; <a href="<?php echo url_for("chapter/show?id=" . $chapter->getId()) ?>"><?php echo $chapter ?></a>
&gt;&gt; <?php echo $section ?>
<?php end_slot() ?>

<h1><?php echo $section ?></h1>

<?php echo $section->getHtmlDescription() ?>

<br/>
<?php if ($previous): ?>
  <div class="fl">
    &lt;&lt; <a href="<?php echo url_for('section/show?id=' . $previous->getId()) ?>"><?php echo $previous ?></a>
  </div>
<?php elseif ($chapterPrevious): ?>
    <div class="fl">
      &lt;&lt; <a href="<?php echo url_for('chapter/show?id=' . $chapterPrevious->getId()) ?>"><?php echo $chapterPrevious ?></a>
    </div>
<?php endif ?>
<?php if ($next): ?>
      <div class="fr">
        <a href="<?php echo url_for('section/show?id=' . $next->getId()) ?>"><?php echo $next ?></a> &gt;&gt;
      </div>
<?php elseif ($chapterNext): ?>
        <div class="fr">
          <a href="<?php echo url_for('chapter/show?id=' . $chapterNext->getId()) ?>"><?php echo $chapterNext ?></a> &gt;&gt;
        </div>
<?php endif ?>