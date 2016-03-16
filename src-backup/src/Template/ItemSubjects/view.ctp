<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Item Subject'), ['action' => 'edit', $itemSubject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Subject'), ['action' => 'delete', $itemSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemSubject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="itemSubjects view large-10 medium-9 columns">
    <h2><?= h($itemSubject->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $itemSubject->has('item') ? $this->Html->link($itemSubject->item->title, ['controller' => 'Items', 'action' => 'view', $itemSubject->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Subject') ?></h6>
            <p><?= $itemSubject->has('subject') ? $this->Html->link($itemSubject->subject->subject_name, ['controller' => 'Subjects', 'action' => 'view', $itemSubject->subject->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($itemSubject->id) ?></p>
        </div>
    </div>
</div>
