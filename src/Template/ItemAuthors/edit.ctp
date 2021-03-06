<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itemAuthor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemAuthor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Item Authors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemAuthors form large-10 medium-9 columns">
    <?= $this->Form->create($itemAuthor) ?>
    <fieldset>
        <legend><?= __('Edit Item Author') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('author_id', ['options' => $authors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
