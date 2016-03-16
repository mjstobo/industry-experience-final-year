
<div class="itemCopies form large-10 medium-9 columns">
    <?= $this->Form->create($itemCopy) ?>
    <fieldset>
        <legend><?= __('<h1>Edit Item Copy</h1>') ?></legend>
        <?php
            echo '<h2>' . $itemCopy->item->title . '<br><br></h3>';
            echo $this->Form->input('barcode');
            echo $this->Form->input('item_status_id', ['options' => $itemStatuses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
