<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $duration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $duration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Durations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Memberships'), ['controller' => 'Memberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['controller' => 'Memberships', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="durations form large-10 medium-9 columns">
    <?= $this->Form->create($duration); ?>
    <fieldset>
        <legend><?= __('Edit Duration') ?></legend>
        <?php
            echo $this->Form->input('duration_name');
            echo $this->Form->input('duration_year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
