<div class="loanLimits form large-10 medium-9 columns">
    <?= $this->Form->create($loanLimit) ?>
    <fieldset>
        <legend><?= __('Edit Loan Limit for '.$loanLimit->limit_item_types) ?></legend>
        <?php
            echo $this->Form->input('limit_amounts');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
