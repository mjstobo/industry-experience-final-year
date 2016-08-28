<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Borrowing'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="borrowings index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($borrowings as $borrowing): ?>
        <tr>
            <td><?= $this->Number->format($borrowing->id) ?></td>
            <td>
                <?= $borrowing->has('user') ? $this->Html->link($borrowing->user->Array, ['controller' => 'Users', 'action' => 'view', $borrowing->user->id]) : '' ?>
            </td>
            <td>
                <?= $borrowing->has('item') ? $this->Html->link($borrowing->item->title, ['controller' => 'Items', 'action' => 'view', $borrowing->item->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $borrowing->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $borrowing->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $borrowing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowing->id)]) ?>
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
