<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Duration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Memberships'), ['controller' => 'Memberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['controller' => 'Memberships', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="durations index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('duration_name') ?></th>
            <th><?= $this->Paginator->sort('duration_year') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($durations as $duration): ?>
        <tr>
            <td><?= $this->Number->format($duration->id) ?></td>
            <td><?= h($duration->duration_name) ?></td>
            <td><?= $this->Number->format($duration->duration_year) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $duration->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $duration->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $duration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $duration->id)]) ?>
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
