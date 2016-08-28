
<div class="orgTypes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('org_type_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($orgTypes as $orgType): ?>
        <tr>
            <td><?= $this->Number->format($orgType->id) ?></td>
            <td><?= h($orgType->org_type_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $orgType->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orgType->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orgType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orgType->id)]) ?>
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
