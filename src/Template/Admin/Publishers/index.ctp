<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>


<span class="inline2"><h1>Publishers </h1></span><span class="addButton"><?= $this->Html->link('Add New', ['action' => 'add']) ?></span>
<div>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Publisher</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($publishers as $publisher): ?>
        <tr>
            <td><?= h($publisher->publisher_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $publisher->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $publisher->id]) ?>

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