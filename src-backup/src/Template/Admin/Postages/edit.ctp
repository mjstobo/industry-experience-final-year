<div class="postages form large-10 medium-9 columns">
    <?= $this->Form->create($postage) ?>
    <fieldset>
        <legend><?= __('Edit Postage') ?></legend>
        <?php
            echo $this->Form->input('state_id', ['options' => $states]);
            echo $this->Form->input('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
