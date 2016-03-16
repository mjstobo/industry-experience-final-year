
<div class="CSSTableGenerator">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('org_type_id') ?></th>
            <th><?= $this->Paginator->sort('org_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($organisations as $organisation): ?>
        <tr>
            <td><?= $this->Number->format($organisation->id) ?></td>
            <td>
                <?= $organisation->has('user') ? $this->Html->link($organisation->user->id, ['controller' => 'Users', 'action' => 'view', $organisation->user->id]) : '' ?>
            </td>
            <td>
                <?= $organisation->has('org_type') ? $this->Html->link($organisation->org_type->org_type_name, ['controller' => 'OrgTypes', 'action' => 'view', $organisation->org_type->id]) : '' ?>
            </td>
            <td><?= h($organisation->org_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $organisation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id)]) ?>
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
