<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Publisher'), ['action' => 'edit', $publisher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Publisher'), ['action' => 'delete', $publisher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publisher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Publishers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publisher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="publishers view large-10 medium-9 columns">
    <h2><?= h($publisher->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Publisher Name') ?></h6>
            <p><?= h($publisher->publisher_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($publisher->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Items') ?></h4>
    <?php if (!empty($publisher->items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Language Id') ?></th>
            <th><?= __('Barcode No') ?></th>
            <th><?= __('Catalogue Id') ?></th>
            <th><?= __('Item Status Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Author Id') ?></th>
            <th><?= __('Subject Id') ?></th>
            <th><?= __('Publisher Id') ?></th>
            <th><?= __('Copies') ?></th>
            <th><?= __('Date Published') ?></th>
            <th><?= __('Edition') ?></th>
            <th><?= __('Notes') ?></th>
            <th><?= __('Isbn') ?></th>
            <th><?= __('Item Type Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($publisher->items as $items): ?>
        <tr>
            <td><?= h($items->id) ?></td>
            <td><?= h($items->language_id) ?></td>
            <td><?= h($items->barcode_no) ?></td>
            <td><?= h($items->catalogue_id) ?></td>
            <td><?= h($items->item_status_id) ?></td>
            <td><?= h($items->title) ?></td>
            <td><?= h($items->author_id) ?></td>
            <td><?= h($items->subject_id) ?></td>
            <td><?= h($items->publisher_id) ?></td>
            <td><?= h($items->copies) ?></td>
            <td><?= h($items->date_published) ?></td>
            <td><?= h($items->edition) ?></td>
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
