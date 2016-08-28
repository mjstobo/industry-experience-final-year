<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reserveStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reserveStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reserve Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserveStatuses form large-10 medium-9 columns">
    <?= $this->Form->create($reserveStatus) ?>
    <fieldset>
        <legend><?= __('Edit Reserve Status') ?></legend>
        <?php
            echo $this->Form->input('status_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
