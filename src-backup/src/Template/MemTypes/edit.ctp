<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $memType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $memType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mem Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="memTypes form large-10 medium-9 columns">
    <?= $this->Form->create($memType); ?>
    <fieldset>
        <legend><?= __('Edit Mem Type') ?></legend>
        <?php
            echo $this->Form->input('mem _name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
