
<div class="orgTypes form large-10 medium-9 columns">
    <?= $this->Form->create($orgType); ?>
    <fieldset>
        <legend><?= __('Edit Org Type') ?></legend>
        <?php
            echo $this->Form->input('org_type_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
