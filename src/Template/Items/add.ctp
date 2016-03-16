
<?php $name = $this->request->session()->read('User.id');
    echo $name; ?>


<div class="items form large-10 medium-9 columns">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php

            echo $this->Form->input('barcode_no');
            echo $this->Form->input('catalogue_id', ['options' => $catalogues]);
            echo $this->Form->input('item_status_id', ['options' => $itemStatuses]);
            echo $this->Form->input('title');
            echo $this->Form->input('author_id', ['options' => $authors, 'empty' => true]);
            echo $this->Form->input('year_id', ['options' => $years ,'label' =>'Publication year','empty' => true]);
            echo $this->Form->input('publisher_id', ['options' => $publishers]);
            echo $this->Form->input('copies');
            echo $this->Form->input('date_published');
            echo $this->Form->input('edition');
            echo $this->Form->input('notes');
            echo $this->Form->input('isbn');
            echo $this->Form->input('item_type_id', ['options' => $itemTypes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>
