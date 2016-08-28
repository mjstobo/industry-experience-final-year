<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Item Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemStatuses index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('item_status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($itemStatuses as $itemStatus): ?>
        <tr>
            <td><?= $this->Number->format($itemStatus->id) ?></td>
            <td><?= h($itemStatus->item_status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $itemStatus->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemStatus->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemStatus->id)]) ?>
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
