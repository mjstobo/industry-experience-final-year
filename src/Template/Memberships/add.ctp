<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Mem Types'), ['controller' => 'MemTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mem Type'), ['controller' => 'MemTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Durations'), ['controller' => 'Durations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Duration'), ['controller' => 'Durations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="memberships form large-10 medium-9 columns">
    <?= $this->Form->create($membership); ?>
    <fieldset>
        <legend><?= __('Add Membership') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
             echo $this->Form->hidden('status_id', ['value' => 1]);
            echo $this->Form->input('mem_type_id', ['options' => $memTypes]);
            echo $this->Form->input('duration_id', ['options' => $durations]);
            echo $this->Form->input('status_id', ['options' => $status]);
            echo $this->Form->input('join_date');
            echo $this->Form->input('expiry_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
