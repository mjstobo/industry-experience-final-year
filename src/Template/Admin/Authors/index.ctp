<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>


<span class="inline2"><h1>Authors </h1></span><span class="addButton"><?= $this->Html->link('Add New', ['action' => 'add']) ?></span>
<div>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Author Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($authors as $author): ?>
        <tr>
            <td><?= h($author->author_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $author->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $author->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

<script>
$(document).ready(function(){
 $('#users').DataTable();
});
</script>
