<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>


<div>
    <span class="inline2"><h1>Shelf Sections </h1></span><span class="addButton"><?= $this->Html->link('Add New', ['action' => 'add']) ?></span>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Shelf Name</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($shelfSections as $shelfSection): ?>
        <tr>
            <td><?= h($shelfSection->shelf_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $shelfSection->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shelfSection->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shelfSection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shelfSection->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>



<script>
$(document).ready(function(){
 $('#users').DataTable();
});
</script>
