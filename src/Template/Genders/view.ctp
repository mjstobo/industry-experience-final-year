<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Gender'), ['action' => 'edit', $gender->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gender'), ['action' => 'delete', $gender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gender'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="genders view large-10 medium-9 columns">
    <h2><?= h($gender->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Gender Type') ?></h6>
            <p><?= h($gender->gender_type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($gender->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($gender->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Type Id') ?></th>
            <th><?= __('Salutation Id') ?></th>
            <th><?= __('Membership Id') ?></th>
            <th><?= __('Contact Type Id') ?></th>
            <th><?= __('Given Name') ?></th>
            <th><?= __('Family Name') ?></th>
            <th><?= __('Date Birth') ?></th>
            <th><?= __('Gender Id') ?></th>
            <th><?= __('Street Address') ?></th>
            <th><?= __('Suburb') ?></th>
            <th><?= __('Postcode') ?></th>
            <th><?= __('State') ?></th>
            <th><?= __('Country Id') ?></th>
            <th><?= __('Email Address') ?></th>
            <th><?= __('Password') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($gender->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->user_type_id) ?></td>
            <td><?= h($users->salutation_id) ?></td>
            <td><?= h($users->membership_id) ?></td>
            <td><?= h($users->contact_type_id) ?></td>
            <td><?= h($users->given_name) ?></td>
            <td><?= h($users->family_name) ?></td>
            <td><?= h($users->date_birth) ?></td>
            <td><?= h($users->gender_id) ?></td>
            <td><?= h($users->street_address) ?></td>
            <td><?= h($users->suburb) ?></td>
            <td><?= h($users->postcode) ?></td>
            <td><?= h($users->state) ?></td>
            <td><?= h($users->country_id) ?></td>
            <td><?= h($users->email_address) ?></td>
            <td><?= h($users->password) ?></td>

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
</div>
