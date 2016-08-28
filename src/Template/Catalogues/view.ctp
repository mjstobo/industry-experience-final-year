<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Catalogue'), ['action' => 'edit', $catalogue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Catalogue'), ['action' => 'delete', $catalogue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catalogue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Catalogues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Catalogue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="catalogues view large-10 medium-9 columns">
    <h2><?= h($catalogue->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Catalogue Name') ?></h6>
            <p><?= h($catalogue->catalogue_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($catalogue->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Items') ?></h4>
    <?php if (!empty($catalogue->items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Catalogue Id') ?></th>
            <th><?= __('Obtainable Item Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Author') ?></th>
            <th><?= __('Category') ?></th>
            <th><?= __('Publisher') ?></th>
            <th><?= __('Copies') ?></th>
            <th><?= __('Date') ?></th>
            <th><?= __('Edition') ?></th>
            <th><?= __('Language') ?></th>
            <th><?= __('Notes') ?></th>
            <th><?= __('Isbn') ?></th>
            <th><?= __('Item Type Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($catalogue->items as $items): ?>
        <tr>
            <td><?= h($items->id) ?></td>
            <td><?= h($items->catalogue_id) ?></td>
            <td><?= h($items->obtainable_item_id) ?></td>
            <td><?= h($items->title) ?></td>
            <td><?= h($items->author) ?></td>
            <td><?= h($items->category) ?></td>
            <td><?= h($items->publisher) ?></td>
            <td><?= h($items->copies) ?></td>
            <td><?= h($items->date) ?></td>
            <td><?= h($items->edition) ?></td>
            <td><?= h($items->language) ?></td>
            <td><?= h($items->notes) ?></td>
            <td><?= h($items->isbn) ?></td>
            <td><?= h($items->item_type_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
