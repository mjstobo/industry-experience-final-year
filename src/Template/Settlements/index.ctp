<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script(['clickable.js']);
?>


<div>
    <br>
    <h1>Payment History</h1>
    <br>
    <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Payment ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Method</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($settlements as $settlement): ?>
        <tr href="settlements/view/<?= h($settlement->id); ?>">
            <td><?= h($settlement->id); ?></td>
            <td><?= h($settlement->payment_date) ?></td>
            <td><?= h("$"."".$settlement->amount) ?></td>
            <td><?= h($settlement->payment_type->pay_type_name) ?></td>
            <td><?= h($settlement->payment_method->method_name) ?></td>


        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

</div>
