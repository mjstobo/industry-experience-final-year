<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->css('viewUserAdmin.css');
  echo $this->Html->script(['clickable.js']);
?>


<div>
    <h1>Active Members List</h1>
    <span class="deleteButton"><?= $this->Html->link(__('View Inactive Members'), ['prefix'=>'admin','controller'=>'users','action'=>'viewinactiveusers']) ?> </span>
    <span class="blueButton"><?= $this->Html->link(__('View All Members'), ['prefix'=>'admin','controller'=>'users','action'=>'viewall']) ?> </span><br><br><br>
    <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Member Type</th>
            <th>Membership</th>
            <th>Acc. Status</th>
            <th>Name </th>
            <th>Contact Type</th>
            <th>Email Address</th>
            <th>Join Date</th>
            <th>Expiry Date</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"users", "action" => "view", $user->id]); ?>">
            <td><?= h($user->user_type->user_type_name); ?></td>
            <td> <?= h($user->memberships[0]->mem_type->mem_name); ?> </td>

            <td><?= h($user->memberships[0]->status->status_name) ?></td>
            <td><?= h($user->given_name)." ".h($user->family_name) ?></td>


            <td><?= h($user->contact_type->contact_types_name) ?></td>
            <td><?= h($user->email_address) ?></td>
            <td><?= h($user->memberships[0]->join_date) ?></td>
            <td><?= h($user->memberships[0]->expiry_date) ?></td>

        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

</div>

