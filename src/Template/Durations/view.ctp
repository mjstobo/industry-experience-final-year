<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Duration'), ['action' => 'edit', $duration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Duration'), ['action' => 'delete', $duration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $duration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Durations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Duration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Memberships'), ['controller' => 'Memberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['controller' => 'Memberships', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="durations view large-10 medium-9 columns">
    <h2><?= h($duration->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Duration Name') ?></h6>
            <p><?= h($duration->duration_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($duration->id) ?></p>
            <h6 class="subheader"><?= __('Duration Year') ?></h6>
            <p><?= $this->Number->format($duration->duration_year) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Memberships') ?></h4>
    <?php if (!empty($duration->memberships)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Mem Type Id') ?></th>
            <th><?= __('Duration Id') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Join Date') ?></th>
            <th><?= __('Expiry Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($duration->memberships as $memberships): ?>
        <tr>
            <td><?= h($memberships->id) ?></td>
            <td><?= h($memberships->user_id) ?></td>
            <td><?= h($memberships->mem_type_id) ?></td>
            <td><?= h($memberships->duration_id) ?></td>
            <td><?= h($memberships->status) ?></td>
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
