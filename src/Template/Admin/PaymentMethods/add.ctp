
<div class="paymentMethods form large-10 medium-9 columns">
    <?= $this->Form->create($paymentMethod) ?>
    <fieldset>
        <legend><?= __('Add Payment Method') ?></legend>
        <?php
            echo $this->Form->input('method_name');
        ?>
    </fieldset><br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
