<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reserveItemCopy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reserveItemCopy->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reserve Item Copies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Copies'), ['controller' => 'ItemCopies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Copy'), ['controller' => 'ItemCopies', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserveItemCopies form large-10 medium-9 columns">
    <?= $this->Form->create($reserveItemCopy) ?>
    <fieldset>
        <legend><?= __('Edit Reserve Item Copy') ?></legend>
        <?php
            echo $this->Form->input('reserve_id', ['options' => $reserves]);
            echo $this->Form->input('item_copy_id', ['options' => $itemCopies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
