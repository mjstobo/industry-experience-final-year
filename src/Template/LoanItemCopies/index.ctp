<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Loan Item Copy'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Copies'), ['controller' => 'ItemCopies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Copy'), ['controller' => 'ItemCopies', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="loanItemCopies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('loan_id') ?></th>
            <th><?= $this->Paginator->sort('item_copy_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($loanItemCopies as $loanItemCopy): ?>
        <tr>
            <td><?= $this->Number->format($loanItemCopy->id) ?></td>
            <td>
                <?= $loanItemCopy->has('loan') ? $this->Html->link($loanItemCopy->loan->id, ['controller' => 'Loans', 'action' => 'view', $loanItemCopy->loan->id]) : '' ?>
            </td>
            <td>
                <?= $loanItemCopy->has('item_copy') ? $this->Html->link($loanItemCopy->item_copy->id, ['controller' => 'ItemCopies', 'action' => 'view', $loanItemCopy->item_copy->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $loanItemCopy->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loanItemCopy->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loanItemCopy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loanItemCopy->id)]) ?>
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
