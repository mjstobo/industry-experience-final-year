
<div class="orgTypes view large-10 medium-9 columns">
    <h2><?= h($orgType->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Org Type Name') ?></h6>
            <p><?= h($orgType->org_type_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($orgType->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Organisations') ?></h4>
    <?php if (!empty($orgType->organisations)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Org Type Id') ?></th>
            <th><?= __('Org Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($orgType->organisations as $organisations): ?>
        <tr>
            <td><?= h($organisations->id) ?></td>
            <td><?= h($organisations->user_id) ?></td>
            <td><?= h($organisations->org_type_id) ?></td>
            <td><?= h($organisations->org_name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Organisations', 'action' => 'view', $organisations->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Organisations', 'action' => 'edit', $organisations->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organisations', 'action' => 'delete', $organisations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisations->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
