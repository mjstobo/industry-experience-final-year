
<div class="authors form large-10 medium-9 columns">
    <?= $this->Form->create($author) ?>
    <fieldset>
        <legend><?= __('Add Author') ?></legend>
        <?php
            echo $this->Form->input('author_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
