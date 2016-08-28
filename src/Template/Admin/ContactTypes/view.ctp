
<div>
    <h1 class="subheader"><?= __('Related Members') ?></h1><br>
    <?php if (!empty($contactType->users)): ?>
    <table class="table table-striped">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Given Name') ?></th>
            <th><?= __('Family Name') ?></th>
            <th><?= __('Street Address') ?></th>
            <th><?= __('Suburb') ?></th>
            <th><?= __('Postcode') ?></th>
            <th><?= __('Email Address') ?></th>

            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($contactType->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->given_name) ?></td>
            <td><?= h($users->family_name) ?></td>
            <td><?= h($users->street_address) ?></td>
            <td><?= h($users->suburb) ?></td>
            <td><?= h($users->postcode) ?></td>
            <td><?= h($users->email_address) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>
