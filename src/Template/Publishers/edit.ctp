<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $publisher->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $publisher->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Publishers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="publishers form large-10 medium-9 columns">
    <?= $this->Form->create($publisher) ?>
    <fieldset>
        <legend><?= __('Edit Publisher') ?></legend>
        <?php
            echo $this->Form->input('publisher_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
