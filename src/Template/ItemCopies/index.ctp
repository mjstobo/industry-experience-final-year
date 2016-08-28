<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Item Copy'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Statuses'), ['controller' => 'ItemStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Status'), ['controller' => 'ItemStatuses', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemCopies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('barcode') ?></th>
            <th><?= $this->Paginator->sort('call_no') ?></th>
            <th><?= $this->Paginator->sort('item_status_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($itemCopies as $itemCopy): ?>
        <tr>
            <td><?= $this->Number->format($itemCopy->id) ?></td>
            <td>
                <?= $itemCopy->has('item') ? $this->Html->link($itemCopy->item->title, ['controller' => 'Items', 'action' => 'view', $itemCopy->item->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($itemCopy->barcode) ?></td>
            <td><?= $this->Number->format($itemCopy->call_no) ?></td>
            <td>
                <?= $itemCopy->has('item_status') ? $this->Html->link($itemCopy->item_status->item_status, ['controller' => 'ItemStatuses', 'action' => 'view', $itemCopy->item_status->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $itemCopy->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemCopy->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemCopy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemCopy->id)]) ?>
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
