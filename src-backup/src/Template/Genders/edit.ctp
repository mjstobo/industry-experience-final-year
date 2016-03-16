<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gender->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Genders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="genders form large-10 medium-9 columns">
    <?= $this->Form->create($gender); ?>
    <fieldset>
        <legend><?= __('Edit Gender') ?></legend>
        <?php
            echo $this->Form->input('gender_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
