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
    <span class="inline2"><h1>Membership Types </h1></span><span class="addButton"><?= $this->Html->link('Add New', ['action' => 'add']) ?></span>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Membership Types</th>
            <th>Category</th>
            <th>Duration</th>
            <th>Cost</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($memTypes as $memType): ?>
        <tr>
            <td><?= h($memType->mem_name) ?></td>
            <td><?= h($memType->membership_category->name) ?></td>
            <td><?= h($memType->duration->duration_name) ?></td>
            <td>$<?= h($memType->mem_price) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $memType->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
