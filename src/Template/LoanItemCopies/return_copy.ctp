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

    <h1>Find Item on Loan</h1><br><br>
    <fieldset class="row1">
        <p>Enter the Item's Barcode:</p>
    <?php echo $this->Form->input('barcode', ['label' => 'Barcode:']); ?>
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
        <h1>Item Returns</h1>
        <br>
        <br>
        <br>
        <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
            <tr><th>Barcode</th>
                <th>Loan ID</th>
                <th>Member Name</th>
                <th>Title</th>
                <th>Date Borrowed</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= h($item->barcode); ?></td>
                <td><?= h($item->loan_item_copy->loan_id); ?></td>
                <td><?= h($item->user->given_name) ?><?= h($items->user->family_name) ?></td>
                <td><?= h($item->item->title) ?></td>
                <td><?= h($item->loan->date_borrowed) ?></td>

            </tr>

            <?php endforeach; } ?>
            </tbody>
        </table>

    </div>

</div>

`