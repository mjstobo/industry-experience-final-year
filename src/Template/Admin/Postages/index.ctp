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
    <span class="inline2"><h1>Postage Costs </h1></span>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>State</th>
            <th>Amount</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($postages as $postage): ?>
        <tr>
            <td><?= h($postage->state->state_name) ?></td>
            <td>$<?= $this->Number->format($postage->amount) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $postage->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
