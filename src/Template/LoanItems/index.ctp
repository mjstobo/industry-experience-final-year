<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Loan Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="loanItems index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('loan_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($loanItems as $loanItem): ?>
        <tr>
            <td><?= $this->Number->format($loanItem->id) ?></td>
            <td>
                <?= $loanItem->has('loan') ? $this->Html->link($loanItem->loan->id, ['controller' => 'Loans', 'action' => 'view', $loanItem->loan->id]) : '' ?>
            </td>
            <td>
                <?= $loanItem->has('item') ? $this->Html->link($loanItem->item->title, ['controller' => 'Items', 'action' => 'view', $loanItem->item->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $loanItem->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loanItem->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loanItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loanItem->id)]) ?>
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
