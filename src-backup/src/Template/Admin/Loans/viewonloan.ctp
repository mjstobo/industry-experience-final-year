<?php
 echo $this->Html->css('viewUserAdmin.css');
echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
    $(document).ready(function(){
        $('#loans').DataTable();
    });
</script>
<div class="loans index large-10 medium-9 columns">
    <h1>Current Loans</h1>
    <span class="activeButton"><?= $this->Html->link(__('View Completed Loans'), ['prefix'=>'admin','controller'=>'loans','action'=>'viewcomplete']) ?> </span>
    <span class="deleteButton"><?= $this->Html->link(__('View All Loans'), ['prefix'=>'admin','controller'=>'loans','action'=>'index']) ?> </span>
    <br><br><br><br>
    <table id="loans" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Loan ID</th>
            <th>Date Borrowed</th>
            <th>Due Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($loans as $loan): ?>
        <tr class="clickable" data-href="loans/view/<?= h($loan->id); ?>">
            <td><?= h($loan->user->id) ?></td>
            <td><?= h($loan->user->given_name)?> <?= h($loan->user->family_name)?></td>
            <td><?= h($loan->id)?> </td>
            <td><?= h($loan->date_borrowed) ?></td>
            <td><?= h($loan->return_date) ?></td>
            <td><?= h($loan->return_status->status_name) ?></td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    jQuery(document).ready(function($) {
        $("tr.clickable").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
