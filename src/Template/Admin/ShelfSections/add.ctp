
<div class="shelfSections form large-10 medium-9 columns">
    <?= $this->Form->create($shelfSection) ?>
    <fieldset>
        <legend><?= __('Add Shelf Section') ?></legend>
        <?php
            echo $this->Form->input('shelf_name');
        ?>
    </fieldset><br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
