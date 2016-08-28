<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itemSubject->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemSubject->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Item Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemSubjects form large-10 medium-9 columns">
    <?= $this->Form->create($itemSubject) ?>
    <fieldset>
        <legend><?= __('Edit Item Subject') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('subject_id', ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
