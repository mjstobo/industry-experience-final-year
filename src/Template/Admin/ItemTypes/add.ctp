
<div class="itemTypes form large-10 medium-9 columns">
    <?= $this->Form->create($itemType) ?>
    <fieldset>
        <legend><?= __('Add Item Type') ?></legend>
        <?php
            echo $this->Form->input('type_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
