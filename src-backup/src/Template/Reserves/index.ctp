<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Reserve'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reserve Statuses'), ['controller' => 'ReserveStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserve Status'), ['controller' => 'ReserveStatuses', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserves index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('request_date') ?></th>
            <th><?= $this->Paginator->sort('reservation_date') ?></th>
            <th><?= $this->Paginator->sort('end_date') ?></th>
            <th><?= $this->Paginator->sort('reserve_status_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reserves as $reserve): ?>
        <tr>
            <td><?= $this->Number->format($reserve->id) ?></td>
            <td>
                <?= $reserve->has('user') ? $this->Html->link($reserve->user->Array, ['controller' => 'Users', 'action' => 'view', $reserve->user->id]) : '' ?>
            </td>
            <td>
                <?= $reserve->has('item') ? $this->Html->link($reserve->item->title, ['controller' => 'Items', 'action' => 'view', $reserve->item->id]) : '' ?>
            </td>
            <td><?= h($reserve->request_date) ?></td>
            <td><?= h($reserve->reservation_date) ?></td>
            <td><?= h($reserve->end_date) ?></td>
            <td>
                <?= $reserve->has('reserve_status') ? $this->Html->link($reserve->reserve_status->id, ['controller' => 'ReserveStatuses', 'action' => 'view', $reserve->reserve_status->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $reserve->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserve->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserve->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserve->id)]) ?>
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
