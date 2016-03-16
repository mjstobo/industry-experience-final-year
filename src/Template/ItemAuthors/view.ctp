<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Item Author'), ['action' => 'edit', $itemAuthor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Author'), ['action' => 'delete', $itemAuthor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemAuthor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Authors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Author'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="itemAuthors view large-10 medium-9 columns">
    <h2><?= h($itemAuthor->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $itemAuthor->has('item') ? $this->Html->link($itemAuthor->item->title, ['controller' => 'Items', 'action' => 'view', $itemAuthor->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Author') ?></h6>
            <p><?= $itemAuthor->has('author') ? $this->Html->link($itemAuthor->author->author_name, ['controller' => 'Authors', 'action' => 'view', $itemAuthor->author->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($itemAuthor->id) ?></p>
        </div>
    </div>
</div>
