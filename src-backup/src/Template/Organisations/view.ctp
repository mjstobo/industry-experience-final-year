
<div class="organisations view large-10 medium-9 columns">
    <h2><?= h($organisation->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $organisation->has('user') ? $this->Html->link($organisation->user->id, ['controller' => 'Users', 'action' => 'view', $organisation->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Org Type') ?></h6>
            <p><?= $organisation->has('org_type') ? $this->Html->link($organisation->org_type->id, ['controller' => 'OrgTypes', 'action' => 'view', $organisation->org_type->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Org Name') ?></h6>
            <p><?= h($organisation->org_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($organisation->id) ?></p>
        </div>
    </div>
</div>
