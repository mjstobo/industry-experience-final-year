<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Loan Limit'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="loanLimits index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('limit_amounts') ?></th>
            <th><?= $this->Paginator->sort('limit_item_types') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($loanLimits as $loanLimit): ?>
        <tr>
            <td><?= $this->Number->format($loanLimit->id) ?></td>
            <td><?= $this->Number->format($loanLimit->limit_amounts) ?></td>
            <td><?= h($loanLimit->limit_item_types) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $loanLimit->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loanLimit->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loanLimit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loanLimit->id)]) ?>
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
