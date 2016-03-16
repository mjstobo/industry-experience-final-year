<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
    $(document).ready(function(){
        $('#users').DataTable();
    });
</script>

<h3><?php echo ('My Membership History'); ?> </h3>

    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Membership ID</th>
            <th>Name</th>
            <th>Length</th>
            <th>Status</th>
            <th>Expiration Date</th>

            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($memberships as $membership): ?>
        <tr>
            <td><?= $this->Number->format($membership->id) ?></td>

            <td>
                <?= $membership->mem_type->mem_name; ?>
            </td>
            <td>
                <?= $membership->duration->duration_name; ?>
            </td>
            <td><?= h($membership->status->status_name) ?></td>

            <td><?= h($membership->expiry_date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $membership->id]) ?>

            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

