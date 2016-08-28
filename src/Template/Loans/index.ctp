<link type="text/css" href="../webroot/css/edit.css" rel="stylesheet" media="all" />
<h3><?php echo ('My Current Loan'); ?> </h3>
<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script(['clickable.js']);


if($results){ ?>
       <div class="items index large-10 medium-9 columns">
            <?php echo $loan_status ?>
        </div>
    <?php } else { ?>



    <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Loan ID</th>
            <th>Date Borrowed</th>
            <th>Status</th>
            <th>Date Due</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($loans as $loan): ?>
        <tr href="loans/view/<?= h($loan->id); ?>">

            <td><?= h($loan->id) ?></td>
            <td><?= h($loan->date_borrowed) ?></td>
            <td><?= h($loan->return_status->status_name) ?></td>
            <td><?= h($loan->return_date) ?></td>

        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <?php
    }
    ?>

