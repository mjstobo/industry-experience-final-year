<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Borrowings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="borrowings form large-10 medium-9 columns">
    <?= $this->Form->create($borrowing) ?>
    <fieldset>
        <legend><?= __('Add Borrowing') ?></legend>
        <?php
           // echo $this->Form->input('user_id',['options'=> $users,'value'=>('Auth.User.id')]);
             echo $this->Form->input('user_id', ['value' => $users]);
            echo $this->Form->input('item_id', ['options' => $items]);


        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
