<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Payment Method'), ['action' => 'edit', $paymentMethod->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment Method'), ['action' => 'delete', $paymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentMethod->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Method'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="paymentMethods view large-10 medium-9 columns">
    <h2><?= h($paymentMethod->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Method Name') ?></h6>
            <p><?= h($paymentMethod->method_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($paymentMethod->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Payments') ?></h4>
    <?php if (!empty($paymentMethod->payments)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Payment Method Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Amount') ?></th>
            <th><?= __('Payment Type Id') ?></th>
            <th><?= __('Payment Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($paymentMethod->payments as $payments): ?>
        <tr>
            <td><?= h($payments->id) ?></td>
            <td><?= h($payments->payment_method_id) ?></td>
            <td><?= h($payments->user_id) ?></td>
            <td><?= h($payments->amount) ?></td>
            <td><?= h($payments->payment_type_id) ?></td>
            <td><?= h($payments->payment_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
