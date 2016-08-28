<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php
    echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
echo $this->Html->script(['clickable.js']);
echo $this->Html->css('viewUserAdmin.css');
?>

<?php if(!isset($term)) { ?>
<div>
    <?= $this->Form->create(null, ['type' => 'get']); ?>

    <h1>Find Membership Renewal - Member Search</h1><br><br>
    <fieldset class="row1">
        <p>You may use a Member's name, email address or Member ID (if known). </p>
        <?php echo $this->Form->input('term', ['label' => 'Search:']); ?>
    </fieldset>


    <div><button class="button">Find Member &raquo;</button></div>

    <?= $this->Form->end() ?>
</div>

<?php } else { ?>
<br>
<div class="clickable index">
    <span class="inline floatLeft"><h1>Member Renewal - Results matching: <?php echo "'".$term."'"; ?></h1></span><span class="activeButton inline floatLeft">&nbsp&nbsp&nbsp
    <?= $this->Html->link('New Search', ['action'=>'renew']) ?> </span>
    <br><br>
    <table id="clickable" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr href="renewconfirm/<?= h($user->id); ?>">
            <td><?= h($user->id); ?></td>
            <td><?= h($user->given_name)." ".h($user->family_name) ?></td>
            <td><?= h($user->email_address) ?></td>
            <td><?= h($user->phone_number); ?> </td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php } ?>