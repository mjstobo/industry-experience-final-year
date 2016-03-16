<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Reserve Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="reserveStatuses index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('status_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reserveStatuses as $reserveStatus): ?>
        <tr>
            <td><?= $this->Number->format($reserveStatus->id) ?></td>
            <td><?= h($reserveStatus->status_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $reserveStatus->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserveStatus->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserveStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserveStatus->id)]) ?>
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
