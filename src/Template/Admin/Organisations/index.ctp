<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
$(document).ready(function(){
 $('#users').DataTable();
});
</script>

<div class="">
    <h1>Organisations</h1>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Organisation Contact</th>
            <th>Organisation Type</th>
            <th>Organisation Name</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($organisations as $organisation): ?>
        <tr>
            <td>
                <?= $organisation->has('user') ? $this->Html->link($organisation->user->family_name, ['controller' => 'Users', 'action' => 'view', $organisation->user->id]) : '' ?>
            </td>
            <td>
                <?= $organisation->has('org_type') ? $this->Html->link($organisation->org_type->org_type_name, ['controller' => 'OrgTypes', 'action' => 'view', $organisation->org_type->id]) : '' ?>
            </td>
            <td><?= h($organisation->org_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $organisation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisation->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>