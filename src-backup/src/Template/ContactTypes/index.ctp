
<div class="CSSTableGenerator">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('contact_types_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contactTypes as $contactType): ?>
        <tr>
            <td><?= $this->Number->format($contactType->id) ?></td>
            <td><?= h($contactType->contact_types_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $contactType->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactType->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactType->id)]) ?>
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
