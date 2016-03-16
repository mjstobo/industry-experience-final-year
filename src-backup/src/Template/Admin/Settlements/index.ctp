<?php
    echo $this->Html->css(['jquery.dataTables.min']);
    echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
    echo $this->Html->script(['clickable.js']);
?>

<div>
    <br>
    <h1>Payment Records - All Members</h1>
    <br>
    <br>
    <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Payment ID</th>
            <th>Member Name</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Method</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($settlements as $settlement): ?>
        <tr href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"settlements", "action" => "view", $settlement->id]); ?>">
            <td><?= h($settlement->id); ?></td>
            <td><?= h($settlement->user->given_name)." ".h($settlement->user->family_name) ?></td>
            <td><?= h($settlement->payment_type->pay_type_name) ?></td>
            <td><?= h("$"."".$settlement->amount) ?></td>
            <td><?= h($settlement->payment_date) ?></td>
            <td><?= h($settlement->payment_method->method_name) ?></td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

</div>
