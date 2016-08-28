
<div class="subjects form large-10 medium-9 columns">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <legend><?= __('Edit Subject') ?></legend>
        <?php
            echo $this->Form->input('subject_name', ['class'=>'inputwidth']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
