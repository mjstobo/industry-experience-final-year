<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Reserve Item Copy'), ['action' => 'edit', $reserveItemCopy->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserve Item Copy'), ['action' => 'delete', $reserveItemCopy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserveItemCopy->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reserve Item Copies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve Item Copy'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Copies'), ['controller' => 'ItemCopies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Copy'), ['controller' => 'ItemCopies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="reserveItemCopies view large-10 medium-9 columns">
    <h2><?= h($reserveItemCopy->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Reserve') ?></h6>
            <p><?= $reserveItemCopy->has('reserve') ? $this->Html->link($reserveItemCopy->reserve->id, ['controller' => 'Reserves', 'action' => 'view', $reserveItemCopy->reserve->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item Copy') ?></h6>
            <p><?= $reserveItemCopy->has('item_copy') ? $this->Html->link($reserveItemCopy->item_copy->id, ['controller' => 'ItemCopies', 'action' => 'view', $reserveItemCopy->item_copy->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($reserveItemCopy->id) ?></p>
        </div>
    </div>
</div>
