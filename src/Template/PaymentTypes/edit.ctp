<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paymentType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paymentType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Payment Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="paymentTypes form large-10 medium-9 columns">
    <?= $this->Form->create($paymentType) ?>
    <fieldset>
        <legend><?= __('Edit Payment Type') ?></legend>
        <?php
            echo $this->Form->input('pay_type_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
