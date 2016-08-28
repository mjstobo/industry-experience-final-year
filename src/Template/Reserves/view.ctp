<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Reserve'), ['action' => 'edit', $reserve->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserve'), ['action' => 'delete', $reserve->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserve->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reserves'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reserve Statuses'), ['controller' => 'ReserveStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve Status'), ['controller' => 'ReserveStatuses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="reserves view large-10 medium-9 columns">
    <h2><?= h($reserve->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $reserve->has('user') ? $this->Html->link($reserve->user->Array, ['controller' => 'Users', 'action' => 'view', $reserve->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $reserve->has('item') ? $this->Html->link($reserve->item->title, ['controller' => 'Items', 'action' => 'view', $reserve->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Reserve Status') ?></h6>
            <p><?= $reserve->has('reserve_status') ? $this->Html->link($reserve->reserve_status->id, ['controller' => 'ReserveStatuses', 'action' => 'view', $reserve->reserve_status->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($reserve->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Request Date') ?></h6>
            <p><?= h($reserve->request_date) ?></p>
            <h6 class="subheader"><?= __('Reservation Date') ?></h6>
            <p><?= h($reserve->reservation_date) ?></p>
            <h6 class="subheader"><?= __('End Date') ?></h6>
            <p><?= h($reserve->end_date) ?></p>
        </div>
    </div>
</div>
