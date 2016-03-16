<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Item Copies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Statuses'), ['controller' => 'ItemStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Status'), ['controller' => 'ItemStatuses', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemCopies form large-10 medium-9 columns">
    <?= $this->Form->create($itemCopy) ?>
    <fieldset>
        <legend><?= __('Add Item Copy') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('barcode');
            echo $this->Form->input('item_status_id', ['options' => $itemStatuses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
