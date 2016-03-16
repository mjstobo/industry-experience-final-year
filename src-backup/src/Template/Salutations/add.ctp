
<div class="salutations form large-10 medium-9 columns">
    <?= $this->Form->create($salutation); ?>
    <fieldset>
        <legend><?= __('Add Salutation') ?></legend>
        <?php
            echo $this->Form->input('salutation_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
