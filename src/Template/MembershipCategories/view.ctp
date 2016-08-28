<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Membership Category'), ['action' => 'edit', $membershipCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Membership Category'), ['action' => 'delete', $membershipCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershipCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Membership Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership Category'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="membershipCategories view large-10 medium-9 columns">
    <h2><?= h($membershipCategory->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($membershipCategory->name) ?></p>
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($membershipCategory->description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($membershipCategory->id) ?></p>
        </div>
    </div>
</div>
