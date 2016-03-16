<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Reserve Status'), ['action' => 'edit', $reserveStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserve Status'), ['action' => 'delete', $reserveStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserveStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reserve Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="reserveStatuses view large-10 medium-9 columns">
    <h2><?= h($reserveStatus->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Status Name') ?></h6>
            <p><?= h($reserveStatus->status_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($reserveStatus->id) ?></p>
        </div>
    </div>
</div>
<div class="related">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Reserves') ?></h4>
    <?php if (!empty($reserveStatus->reserves)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Item Id') ?></th>
            <th><?= __('Request Date') ?></th>
            <th><?= __('Reservation Date') ?></th>
            <th><?= __('End Date') ?></th>
            <th><?= __('Reserve Status Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($reserveStatus->reserves as $reserves): ?>
        <tr>
            <td><?= h($reserves->id) ?></td>
            <td><?= h($reserves->user_id) ?></td>
            <td><?= h($reserves->item_id) ?></td>
            <td><?= h($reserves->request_date) ?></td>
            <td><?= h($reserves->reservation_date) ?></td>
            <td><?= h($reserves->end_date) ?></td>
            <td><?= h($reserves->reserve_status_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Reserves', 'action' => 'view', $reserves->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Reserves', 'action' => 'edit', $reserves->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reserves', 'action' => 'delete', $reserves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserves->id)]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
