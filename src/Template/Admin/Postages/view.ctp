<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Postage'), ['action' => 'edit', $postage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Postage'), ['action' => 'delete', $postage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Postages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Postage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="postages view large-10 medium-9 columns">
    <h2><?= h($postage->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('State') ?></h6>
            <p><?= $postage->has('state') ? $this->Html->link($postage->state->state_name, ['controller' => 'States', 'action' => 'view', $postage->state->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($postage->id) ?></p>
            <h6 class="subheader"><?= __('Amount') ?></h6>
            <p><?= $this->Number->format($postage->amount) ?></p>
        </div>
    </div>
</div>
