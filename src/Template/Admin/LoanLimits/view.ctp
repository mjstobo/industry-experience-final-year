<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Loan Limit'), ['action' => 'edit', $loanLimit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loan Limit'), ['action' => 'delete', $loanLimit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loanLimit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loan Limits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan Limit'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="loanLimits view large-10 medium-9 columns">
    <h2><?= h($loanLimit->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Limit Item Types') ?></h6>
            <p><?= h($loanLimit->limit_item_types) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($loanLimit->id) ?></p>
            <h6 class="subheader"><?= __('Limit Amounts') ?></h6>
            <p><?= $this->Number->format($loanLimit->limit_amounts) ?></p>
        </div>
    </div>
</div>
