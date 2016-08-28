<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Reserve Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Return Statuses'), ['controller' => 'ReturnStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Return Status'), ['controller' => 'ReturnStatuses', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserveItems form large-10 medium-9 columns">
    <?= $this->Form->create($reserveItem) ?>
    <fieldset>
        <legend><?= __('Add Reserve Item') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('return_status_id', ['options' => $returnStatuses]);
            echo $this->Form->input('date_reserved');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
