<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Item Author'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemAuthors index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('author_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($itemAuthors as $itemAuthor): ?>
        <tr>
            <td><?= $this->Number->format($itemAuthor->id) ?></td>
            <td>
                <?= $itemAuthor->has('item') ? $this->Html->link($itemAuthor->item->title, ['controller' => 'Items', 'action' => 'view', $itemAuthor->item->id]) : '' ?>
            </td>
            <td>
                <?= $itemAuthor->has('author') ? $this->Html->link($itemAuthor->author->author_name, ['controller' => 'Authors', 'action' => 'view', $itemAuthor->author->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $itemAuthor->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemAuthor->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemAuthor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemAuthor->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
