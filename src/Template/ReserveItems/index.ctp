<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Reserve Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Return Statuses'), ['controller' => 'ReturnStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Return Status'), ['controller' => 'ReturnStatuses', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserveItems index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('return_status_id') ?></th>
            <th><?= $this->Paginator->sort('date_reserved') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reserveItems as $reserveItem): ?>
        <tr>
            <td><?= $this->Number->format($reserveItem->id) ?></td>
            <td>
                <?= $reserveItem->has('user') ? $this->Html->link($reserveItem->user->Array, ['controller' => 'Users', 'action' => 'view', $reserveItem->user->id]) : '' ?>
            </td>
            <td>
                <?= $reserveItem->has('item') ? $this->Html->link($reserveItem->item->title, ['controller' => 'Items', 'action' => 'view', $reserveItem->item->id]) : '' ?>
            </td>
            <td>
                <?= $reserveItem->has('return_status') ? $this->Html->link($reserveItem->return_status->id, ['controller' => 'ReturnStatuses', 'action' => 'view', $reserveItem->return_status->id]) : '' ?>
            </td>
            <td><?= h($reserveItem->date_reserved) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $reserveItem->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserveItem->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserveItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserveItem->id)]) ?>
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
