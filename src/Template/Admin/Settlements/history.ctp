<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script(['clickable.js']);
?>

<?php if(!$result) { ?>
<div>
    <?= $this->Form->create(); ?>

    <h1>Find Member Payment History</h1><br><br>
    <fieldset class="row1">
        <p>Enter the Members email address:</p>
    <?php echo $this->Form->input('email_address', ['class' => 'email', 'label' => 'Email Address:']); ?>
    </fieldset>


    <div><button class="button">Find Records &raquo;</button></div>

    <?= $this->Form->end() ?>
</div>

<?php } else { ?>

<?php echo $this->Html->css('viewUserAdmin.css');?>

<div>
    <script>
        $(document).ready(function(){
            $('#users').DataTable( {
                "searching":   false
            } );
        } );
    </script>

    <div>
        <br>
        <h1>Payment Records - <?php echo $user[0]->email_address; ?></h1>
        <br>
        <br>
        <br>
        <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Payment ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Method</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user[0]->settlements as $settlement): ?>
            <tr href="view/<?= h($settlement->id); ?>">
                <td><?= h($settlement->id); ?></td>
                <td><?= h($settlement->payment_type->pay_type_name) ?></td>
                <td><?= h("$"."".$settlement->amount) ?></td>
                <td><?= h($settlement->payment_date) ?></td>
                <td><?= h($settlement->payment_method->method_name) ?></td>
            </tr>

            <?php endforeach; } ?>
            </tbody>
        </table>

    </div>

</div>

