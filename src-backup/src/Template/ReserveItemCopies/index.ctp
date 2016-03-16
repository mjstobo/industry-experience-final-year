<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Reserve Item Copy'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Copies'), ['controller' => 'ItemCopies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Copy'), ['controller' => 'ItemCopies', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserveItemCopies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('reserve_id') ?></th>
            <th><?= $this->Paginator->sort('item_copy_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reserveItemCopies as $reserveItemCopy): ?>
        <tr>
            <td><?= $this->Number->format($reserveItemCopy->id) ?></td>
            <td>
                <?= $reserveItemCopy->has('reserve') ? $this->Html->link($reserveItemCopy->reserve->id, ['controller' => 'Reserves', 'action' => 'view', $reserveItemCopy->reserve->id]) : '' ?>
            </td>
            <td>
                <?= $reserveItemCopy->has('item_copy') ? $this->Html->link($reserveItemCopy->item_copy->id, ['controller' => 'ItemCopies', 'action' => 'view', $reserveItemCopy->item_copy->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $reserveItemCopy->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserveItemCopy->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserveItemCopy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserveItemCopy->id)]) ?>
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
