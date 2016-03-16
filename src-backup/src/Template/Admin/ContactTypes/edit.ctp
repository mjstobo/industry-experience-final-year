
<div class="contactTypes form large-10 medium-9 columns">
    <?= $this->Form->create($contactType); ?>
    <fieldset>
        <legend><?= __('Edit Contact Type') ?></legend>
        <?php
            echo $this->Form->input('contact_types_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
