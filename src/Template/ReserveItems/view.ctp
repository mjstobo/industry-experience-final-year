<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Reserve Item'), ['action' => 'edit', $reserveItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserve Item'), ['action' => 'delete', $reserveItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserveItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reserve Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Return Statuses'), ['controller' => 'ReturnStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Return Status'), ['controller' => 'ReturnStatuses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="reserveItems view large-10 medium-9 columns">
    <h2><?= h($reserveItem->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $reserveItem->has('user') ? $this->Html->link($reserveItem->user->Array, ['controller' => 'Users', 'action' => 'view', $reserveItem->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $reserveItem->has('item') ? $this->Html->link($reserveItem->item->title, ['controller' => 'Items', 'action' => 'view', $reserveItem->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Return Status') ?></h6>
            <p><?= $reserveItem->has('return_status') ? $this->Html->link($reserveItem->return_status->id, ['controller' => 'ReturnStatuses', 'action' => 'view', $reserveItem->return_status->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($reserveItem->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Reserved') ?></h6>
            <p><?= h($reserveItem->date_reserved) ?></p>
        </div>
    </div>
</div>
