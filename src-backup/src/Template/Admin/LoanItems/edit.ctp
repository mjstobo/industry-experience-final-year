<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loanItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loanItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Loan Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="loanItems form large-10 medium-9 columns">
    <?= $this->Form->create($loanItem) ?>
    <fieldset>
        <legend><?= __('Edit Loan Item') ?></legend>
        <?php
            echo $this->Form->input('loan_id', ['options' => $loans]);
            echo $this->Form->input('item_id', ['options' => $items]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
