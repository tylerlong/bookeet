<h1>Discover and Share free e-books</h1>

<table>
  <tbody>
    <?php foreach ($translations as $translation): ?>
      <tr>
        <td>
          <a href="<?php echo url_for('translation/show?id=' . $translation->getId()) ?>"><?php echo $translation ?></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
