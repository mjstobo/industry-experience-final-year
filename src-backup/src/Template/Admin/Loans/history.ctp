<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="../../webroot/js/control.js"></script>
<link type="text/css" href="../../webroot/css/formAdminUser.css" rel="stylesheet" media="all" />
<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<?php if(!$result) { ?>
<div>
    <?= $this->Form->create(); ?>

    <h1>Find Member Loan History</h1><br><br>
    <fieldset class="row1">
        <p>Enter the Members email address:</p>
        <?php echo $this->Form->input('email_address', ['class' => 'email', 'label' => 'Email Address:']); ?>
    </fieldset>

    <div><button class="button">Find Records &raquo;</button></div>

    <?= $this->Form->end() ?>
</div>

<?php } else { ?>

<?php echo $this->Html->css('viewUserAdmin.css');?>

<script>
    $(document).ready(function(){
        $('#loans').DataTable( {
            "searching":   false
        } );
    } );
</script>
<div class="loans index large-10 medium-9 columns">
    <h1>All Loans - <?php echo $user[0]->email_address; ?></h1>
    <span class="activeButton"><?= $this->Html->link(__('View Completed Loans'), ['prefix'=>'admin','controller'=>'loans','action'=>'viewcomplete']) ?> </span>
    <span class="deleteButton"><?= $this->Html->link(__('View Current Loans'), ['prefix'=>'admin','controller'=>'loans','action'=>'viewonloan']) ?> </span>
    <br><br><br><br>
    <table id="loans" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Loan ID</th>
            <th>Date Borrowed</th>
            <th>Due Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($user[0]->loans as $loan): ?>
        <tr class="clickable" data-href="loans/view/<?= h($loan->id); ?>">
            <td><?= h($loan->id) ?></td>
            <td><?= h($loan->date_borrowed) ?></td>
            <td><?= h($loan->return_date) ?></td>
            <td><?= h($loan->return_status->status_name) ?></td>
        </tr>

        <?php endforeach; } ?>

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
