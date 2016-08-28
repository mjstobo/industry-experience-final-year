<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
$(document).ready(function(){
 $('#users').DataTable();
});
</script>



<div>
    <span class="inline2"><h1>Item Statuses </h1></span><span class="addButton"><?= $this->Html->link('Add New', ['action' => 'add']) ?></span>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Item Status</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($itemStatuses as $itemStatus): ?>
        <tr>
            <td><?= h($itemStatus->item_status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemStatus->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

</div>
