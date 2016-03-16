<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Memberships'), ['controller' => 'Memberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['controller' => 'Memberships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="status view large-10 medium-9 columns">
    <h2><?= h($status->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Status Name') ?></h6>
            <p><?= h($status->status_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($status->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Memberships') ?></h4>
    <?php if (!empty($status->memberships)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Mem Type Id') ?></th>
            <th><?= __('Status Id') ?></th>
            <th><?= __('Duration Id') ?></th>
            <th><?= __('Join Date') ?></th>
            <th><?= __('Expiry Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($status->memberships as $memberships): ?>
        <tr>
            <td><?= h($memberships->id) ?></td>
            <td><?= h($memberships->user_id) ?></td>
            <td><?= h($memberships->mem_type_id) ?></td>
            <td><?= h($memberships->status_id) ?></td>
            <td><?= h($memberships->duration_id) ?></td>
            <td><?= h($memberships->join_date) ?></td>
            <td><?= h($memberships->expiry_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Memberships', 'action' => 'view', $memberships->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Memberships', 'action' => 'edit', $memberships->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Memberships', 'action' => 'delete', $memberships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberships->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($status->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Type Id') ?></th>
            <th><?= __('Salutation Id') ?></th>
            <th><?= __('Organisation Id') ?></th>
            <th><?= __('Contact Type Id') ?></th>
            <th><?= __('Status Id') ?></th>
            <th><?= __('Given Name') ?></th>
            <th><?= __('Family Name') ?></th>
            <th><?= __('Date Birth') ?></th>
            <th><?= __('Gender Id') ?></th>
            <th><?= __('Street Address') ?></th>
            <th><?= __('Suburb') ?></th>
            <th><?= __('State Id') ?></th>
            <th><?= __('Postcode') ?></th>
            <th><?= __('Country Id') ?></th>
            <th><?= __('Phone Number') ?></th>
            <th><?= __('Email Address') ?></th>
            <th><?= __('Password') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($status->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->user_type_id) ?></td>
            <td><?= h($users->salutation_id) ?></td>
            <td><?= h($users->organisation_id) ?></td>
            <td><?= h($users->contact_type_id) ?></td>
            <td><?= h($users->status_id) ?></td>
            <td><?= h($users->given_name) ?></td>
            <td><?= h($users->family_name) ?></td>
            <td><?= h($users->date_birth) ?></td>
            <td><?= h($users->gender_id) ?></td>
            <td><?= h($users->street_address) ?></td>
            <td><?= h($users->suburb) ?></td>
            <td><?= h($users->state_id) ?></td>
            <td><?= h($users->postcode) ?></td>
            <td><?= h($users->country_id) ?></td>
            <td><?= h($users->phone_number) ?></td>
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
