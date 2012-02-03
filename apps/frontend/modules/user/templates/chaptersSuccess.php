<?php slot('breadcrumb') ?>
<a href="<?php echo url_for('user/index') ?>"><?php echo $sf_user->getName() ?></a>
&gt;&gt; <?php echo $translation ?>
<?php end_slot() ?>

<h1><?php echo $translation ?></h1>
<h2>Chapters</h2>

<table>
  <tbody>
    <?php foreach ($chapters as $chapter): ?>
      <tr>
        <td>
          <a href="<?php echo url_for('chapter/edit?id=' . $chapter->getId()) ?>"><?php echo $chapter ?></a> <img src="/images/edit.png" alt="edit"/>
        </td>
        <td><a href="<?php echo url_for('chapter/show?id=' . $chapter->getId()) ?>">Preview</a> <img src="/images/tick.png" alt="preview"/></td>
        <td><a href="<?php echo url_for('user/sections?id=' . $chapter->getId()) ?>">View Sections</a> <img src="/images/edit.png" alt="edit"/></td>
      </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr><td colspan="3">
          <img src="/images/new.png" alt="new"/><a href="<?php echo url_for('chapter/new?id=' . $translation->getId()) ?>">Add a new chapter</a>
      </td></tr>
  </tfoot>
</table>