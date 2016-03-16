<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script(['clickable.js']);
  echo $this->Html->css('viewUserAdmin.css');
?>


<div>
    <h1>Members List</h1>
    <span class="deleteButton"><?= $this->Html->link('View Inactive Members', ['prefix'=>'admin','controller'=>'users','action'=>'viewinactiveusers']) ?> </span>
    <span class="activeButton"><?= $this->Html->link('View Active Members', ['prefix'=>'admin','controller'=>'users','action'=>'viewactiveusers']) ?> </span><br><br><br>
    <table id="clickable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Member Type</th>
            <th>Acc. Status</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Contact Type</th>
            <th>Membership Type</th>


        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"users", "action" => "view", $user->id]); ?>">
            <td><?= h($user->user_type->user_type_name); ?></td>
            <td><?= h($user->mem) ?></td>
            <td><?= h($user->given_name)." ".h($user->family_name) ?></td>
            <td><?= h($user->email_address) ?></td>
            <td><?= h($user->contact_type->contact_types_name) ?></td>
            <td><?= h($user->memberships[0]->mem_type->mem_name); ?> </td>

        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

</div>

