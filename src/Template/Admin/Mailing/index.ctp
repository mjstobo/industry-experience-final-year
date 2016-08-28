
<?php
    echo $this->Html->css(['jquery.dataTables.min']);
    echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
    echo $this->Html->script(['clickable.js']);
?>



<div class="users index large-10 medium-9 columns">
    <h1>Member List - Subscription Management</h1>
    <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr >
            <th>Name </th>
            <th>Email Address</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"mailing", "action" => "view", $user->id]); ?>">
            <td><?= h($user->given_name)." ".h($user->family_name) ?></td>
            <td><?= h($user->email_address) ?></td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

</div>
