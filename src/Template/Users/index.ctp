
<div class="CSSTableGenerator">
           <h1>Users</h1>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_type_id') ?></th>
            <th><?= $this->Paginator->sort('salutation_id') ?></th>
           <!-- <th><?= $this->Paginator->sort('membership_id') ?></th> -->
            <th><?= $this->Paginator->sort('contact_type_id') ?></th>
            <th><?= $this->Paginator->sort('given_name') ?></th>
            <th><?= $this->Paginator->sort('family_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td>
                <?= $user->has('user_type') ? $this->Html->link($user->user_type->user_type_name, ['controller' => 'UserTypes', 'action' => 'view', $user->user_type->id]) : '' ?>
            </td>
            <td>
                <?= $user->has('salutation') ? $this->Html->link($user->salutation->salutation_name, ['controller' => 'Salutations', 'action' => 'view', $user->salutation->id]) : '' ?>
            </td>
           <!-- <td>
                <?= $user->has('membership') ? $this->Html->link($user->membership->id, ['controller' => 'Memberships', 'action' => 'view', $user->membership->id]) : '' ?>
             </td> -->
            <td>
                <?= $user->has('contact_type') ? $this->Html->link($user->contact_type->contact_types_name, ['controller' => 'ContactTypes', 'action' => 'view', $user->contact_type->id]) : '' ?>
            </td>
            <td><?= h($user->given_name) ?></td>
            <td><?= h($user->family_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
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
