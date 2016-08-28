
<div class="organisations form large-10 medium-9 columns">
    <?= $this->Form->create($organisation); ?>
    <fieldset>
        <legend><?= __('Add Organisation') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('org_type_id', ['options' => $orgTypes]);
            echo $this->Form->input('org_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
