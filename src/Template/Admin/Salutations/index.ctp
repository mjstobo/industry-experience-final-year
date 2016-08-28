
<div class="CSSTableGenerator">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('salutation_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($salutations as $salutation): ?>
        <tr>
            <td><?= h($salutation->salutation_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $salutation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salutation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salutation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salutation->id)]) ?>
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
