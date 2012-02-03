<table>
  <tr><th>Name</th><th>Status</th><th>Actions</th></tr>
  <?php foreach ($models as $model): ?>
  <tr>
    <td><a href="<?php echo url_for($name . '/show?id=' . $model->getId()) ?>"><?php echo $model ?></a></td>
    <?php if(!$model->getIsActivated()): ?>
    <td>Newly Created</td>
    <td><img src="/images/tick.png" alt="tick"/> <a href="<?php echo url_for('moderator/approve?model=' . $name . '&id=' . $model->getId())?>">Approve</a>;
      <img src="/images/delete.png" alt="delete"/> <a href="<?php echo url_for('moderator/delete?model=' . $name . '&id=' . $model->getId()) ?>" onClick="return confirm('Are you sure?')">Delete</a>
    </td>
    <?php elseif($model->getDeletedAt()!=null): ?>
    <td>To be Deleted</td>
    <td><img src="/images/delete.png" alt="delete"/> <a href="<?php echo url_for('moderator/delete?model=' . $name . '&id=' . $model->getId()) ?>" onClick="return confirm('Are you sure?')">Delete</a>;
      <img src="/images/revert.png" alt="revert"/> <a href="<?php echo url_for('moderator/revert?model=' . $name . '&id=' . $model->getId()) ?>">Revert</a>
    </td>
    <?php endif ?>
  </tr>
  <?php endforeach ?>
</table>