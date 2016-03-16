<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Loan Item Copies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Copies'), ['controller' => 'ItemCopies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Copy'), ['controller' => 'ItemCopies', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="loanItemCopies form large-10 medium-9 columns">
    <?= $this->Form->create($loanItemCopy) ?>
    <fieldset>
        <legend><?= __('Add Loan Item Copy') ?></legend>
        <?php
            echo $this->Form->input('loan_id', ['options' => $loans]);
            echo $this->Form->input('item_copy_id', ['options' => $itemCopies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
