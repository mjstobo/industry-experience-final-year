<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script(['clickable.js']);
?>

<div class="CSSTableGenerator">
    <h1>Membership List</h1>
    <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Member Name') ?></th>
            <th><?= $this->Paginator->sort('join_date') ?></th>
            <th><?= $this->Paginator->sort('expiry_date') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($memberships as $members): ?>
        <tr href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"memberships", "action" => "view", $members->id]); ?>">
            <td><?= h($members->user->given_name) ?> <?= h($members->user->family_name) ?>  </td>
            <td><?= h($members->join_date) ?></td>
            <td><?= h($members->expiry_date) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

</div>


