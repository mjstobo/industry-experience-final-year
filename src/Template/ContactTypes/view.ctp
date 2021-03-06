
<div class="contactTypes view large-10 medium-9 columns">
    <h2><?= h($contactType->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Contact Types Name') ?></h6>
            <p><?= h($contactType->contact_types_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($contactType->id) ?></p>
        </div>
    </div>
</div>
<div class="CSSTableGenerator">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($contactType->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Given Name') ?></th>
            <th><?= __('Family Name') ?></th>
            <th><?= __('Date Birth') ?></th>
            <th><?= __('Gender') ?></th>
            <th><?= __('Street Address') ?></th>
            <th><?= __('Suburb') ?></th>
            <th><?= __('Postcode') ?></th>
            <th><?= __('State') ?></th>
            <th><?= __('Country') ?></th>
            <th><?= __('Email Address') ?></th>

            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($contactType->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->given_name) ?></td>
            <td><?= h($users->family_name) ?></td>
            <td><?= h($users->date_birth) ?></td>
            <td><?= h($users->gender) ?></td>
            <td><?= h($users->street_address) ?></td>
            <td><?= h($users->suburb) ?></td>
            <td><?= h($users->postcode) ?></td>
            <td><?= h($users->state) ?></td>
            <td><?= h($users->country) ?></td>
            <td><?= h($users->email_address) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>
