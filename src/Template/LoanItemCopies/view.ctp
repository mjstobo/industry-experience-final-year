<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Loan Item Copy'), ['action' => 'edit', $loanItemCopy->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loan Item Copy'), ['action' => 'delete', $loanItemCopy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loanItemCopy->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loan Item Copies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan Item Copy'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Copies'), ['controller' => 'ItemCopies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Copy'), ['controller' => 'ItemCopies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="loanItemCopies view large-10 medium-9 columns">
    <h2><?= h($loanItemCopy->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Loan') ?></h6>
            <p><?= $loanItemCopy->has('loan') ? $this->Html->link($loanItemCopy->loan->id, ['controller' => 'Loans', 'action' => 'view', $loanItemCopy->loan->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item Copy') ?></h6>
            <p><?= $loanItemCopy->has('item_copy') ? $this->Html->link($loanItemCopy->item_copy->id, ['controller' => 'ItemCopies', 'action' => 'view', $loanItemCopy->item_copy->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($loanItemCopy->id) ?></p>
        </div>
    </div>
</div>
