<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $catalogue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $catalogue->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Catalogues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="catalogues form large-10 medium-9 columns">
    <?= $this->Form->create($catalogue) ?>
    <fieldset>
        <legend><?= __('Edit Catalogue') ?></legend>
        <?php
            echo $this->Form->input('catalogue_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
