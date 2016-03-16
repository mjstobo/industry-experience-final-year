
<div class="publishers form large-10 medium-9 columns">
    <?= $this->Form->create($publisher) ?>
    <fieldset>
        <legend><?= __('Add Publisher') ?></legend>
        <?php
            echo $this->Form->input('publisher_name',['class'=>'inputwidth']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
