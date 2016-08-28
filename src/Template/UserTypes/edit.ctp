
<div class="userTypes form large-10 medium-9 columns">
    <?= $this->Form->create($userType); ?>
    <fieldset>
        <legend><?= __('Edit User Type') ?></legend>
        <?php
            echo $this->Form->input('user_type_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
