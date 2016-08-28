<?php echo $this->Html->css('viewUserAdmin.css');?>

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
    <h1>Overdue.</h1>
    <table id="overdue" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Loan ID</th>
            <th>Member</th>
             <th>Email Address</th>
            <th>Phone Number</th>
            <th>Loan Status</th>
            <th>Date Borrowed</th>
            <th>Date Due</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($overdue as $due): ?>
        <tr class="clickable" data-href="view/<?= h($due->id); ?>">
            <td><?= h($due->id); ?></td>
            <td><?= h($due->user->given_name)." ".h($due->user->family_name) ?></td>
            <td><?= h($due->user->email_address) ?></td>
            <td><?= h($due->user->phone_number) ?></td>
            <td><?= h($due->return_status->status_name); ?> </td>
            <td><?= h($due->date_borrowed) ?></td>
            <td><?= h($due->return_date) ?></td>
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

