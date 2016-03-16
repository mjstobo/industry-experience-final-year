<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Reserves'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reserve Statuses'), ['controller' => 'ReserveStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserve Status'), ['controller' => 'ReserveStatuses', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserves form large-10 medium-9 columns">
    <?= $this->Form->create($reserve) ?>
    <fieldset>
        <legend><?= __('Add Reserve') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('request_date');
            echo $this->Form->input('reservation_date');
            echo $this->Form->input('end_date');
            echo $this->Form->input('reserve_status_id', ['options' => $reserveStatuses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
