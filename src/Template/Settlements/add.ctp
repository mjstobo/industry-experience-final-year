<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Settlements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payment Types'), ['controller' => 'PaymentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Type'), ['controller' => 'PaymentTypes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="settlements form large-10 medium-9 columns">
    <?= $this->Form->create($settlement) ?>
    <fieldset>
        <legend><?= __('Add Settlement') ?></legend>
        <?php
            echo $this->Form->input('payment_method_id', ['options' => $paymentMethods]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('amount');
            echo $this->Form->input('payment_type_id', ['options' => $paymentTypes]);
            echo $this->Form->input('payment_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
