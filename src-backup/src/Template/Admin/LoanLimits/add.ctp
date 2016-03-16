<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Loan Limits'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="loanLimits form large-10 medium-9 columns">
    <?= $this->Form->create($loanLimit) ?>
    <fieldset>
        <legend><?= __('Add Loan Limit') ?></legend>
        <?php
            echo $this->Form->input('limit_amounts');
            echo $this->Form->input('limit_item_types');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
