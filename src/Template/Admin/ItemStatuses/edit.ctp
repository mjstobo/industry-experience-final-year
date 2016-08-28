
<div class="itemStatuses form large-10 medium-9 columns">
    <?= $this->Form->create($itemStatus) ?>
    <fieldset>
        <legend><?= __('Edit Item Status') ?></legend>
        <?php
            echo $this->Form->input('item_status',['label'=>'Item Status Name: ']);
        ?>
    </fieldset><br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
