<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Item Subject'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemSubjects index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('subject_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($itemSubjects as $itemSubject): ?>
        <tr>
            <td><?= $this->Number->format($itemSubject->id) ?></td>
            <td>
                <?= $itemSubject->has('item') ? $this->Html->link($itemSubject->item->title, ['controller' => 'Items', 'action' => 'view', $itemSubject->item->id]) : '' ?>
            </td>
            <td>
                <?= $itemSubject->has('subject') ? $this->Html->link($itemSubject->subject->subject_name, ['controller' => 'Subjects', 'action' => 'view', $itemSubject->subject->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $itemSubject->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemSubject->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemSubject->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
