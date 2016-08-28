<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Borrowing'), ['action' => 'edit', $borrowing->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Borrowing'), ['action' => 'delete', $borrowing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowing->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Borrowings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="borrowings view large-10 medium-9 columns">
    <h2><?= h($borrowing->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $borrowing->has('user') ? $this->Html->link($borrowing->user->Array, ['controller' => 'Users', 'action' => 'view', $borrowing->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $borrowing->has('item') ? $this->Html->link($borrowing->item->title, ['controller' => 'Items', 'action' => 'view', $borrowing->item->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($borrowing->id) ?></p>
        </div>
    </div>
</div>
