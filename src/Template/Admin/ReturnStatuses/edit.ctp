<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $returnStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $returnStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Return Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="returnStatuses form large-10 medium-9 columns">
    <?= $this->Form->create($returnStatus) ?>
    <fieldset>
        <legend><?= __('Edit Return Status') ?></legend>
        <?php
            echo $this->Form->input('status_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
