<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Return Statuses'), ['controller' => 'ReturnStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Return Status'), ['controller' => 'ReturnStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loan Items'), ['controller' => 'LoanItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan Item'), ['controller' => 'LoanItems', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="loans form large-10 medium-9 columns">
    <?= $this->Form->create($loan) ?>
    <fieldset>
        <legend><?= __('Edit Loan') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('date_borrowed');
            echo $this->Form->input('return_status_id', ['options' => $returnStatuses]);
            echo $this->Form->input('return_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
