<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>


<span class="inline2"><h1>Subjects </h1></span><span class="addButton"><?= $this->Html->link('Add New', ['action' => 'add']) ?></span>
<div>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($subjects as $subject): ?>
        <tr>
            <td><?= h($subject->subject_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $subject->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subject->id]) ?>
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