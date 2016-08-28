<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Return Status'), ['action' => 'edit', $returnStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Return Status'), ['action' => 'delete', $returnStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $returnStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Return Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Return Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="returnStatuses view large-10 medium-9 columns">
    <h2><?= h($returnStatus->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Status Name') ?></h6>
            <p><?= h($returnStatus->status_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($returnStatus->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Loans') ?></h4>
    <?php if (!empty($returnStatus->loans)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Date Borrowed') ?></th>
            <th><?= __('Return Status Id') ?></th>
            <th><?= __('Return Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($returnStatus->loans as $loans): ?>
        <tr>
            <td><?= h($loans->id) ?></td>
            <td><?= h($loans->user_id) ?></td>
            <td><?= h($loans->date_borrowed) ?></td>
            <td><?= h($loans->return_status_id) ?></td>
            <td><?= h($loans->return_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Loans', 'action' => 'edit', $loans->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loans', 'action' => 'delete', $loans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loans->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
