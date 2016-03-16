<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Loan Item'), ['action' => 'edit', $loanItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loan Item'), ['action' => 'delete', $loanItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loanItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loan Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="loanItems view large-10 medium-9 columns">
    <h2><?= h($loanItem->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Loan') ?></h6>
            <p><?= $loanItem->has('loan') ? $this->Html->link($loanItem->loan->id, ['controller' => 'Loans', 'action' => 'view', $loanItem->loan->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $loanItem->has('item') ? $this->Html->link($loanItem->item->title, ['controller' => 'Items', 'action' => 'view', $loanItem->item->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($loanItem->id) ?></p>
        </div>
    </div>
</div>
