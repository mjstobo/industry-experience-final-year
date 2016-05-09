<?php if($deletable == true)
{ ?>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Shelf Section'), ['action' => 'edit', $shelfSection->id]) ?> </li>

        <li><?= $this->Html->link(__('List Shelf Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shelf Section'), ['action' => 'add']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shelf Section'), ['action' => 'delete', $shelfSection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shelfSection->id)]) ?> </li>


    </ul>
</div>
<div class="shelfSections view large-10 medium-9 columns">
    <h2><?= h($shelfSection->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Shelf Name') ?></h6>
            <p><?= h($shelfSection->shelf_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($shelfSection->id) ?></p>
        </div>
    </div>
</div>

<?php
}
?>
<?php if($deletable == false)
{ ?>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Shelf Section'), ['action' => 'edit', $shelfSection->id]) ?> </li>

        <li><?= $this->Html->link(__('List Shelf Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shelf Section'), ['action' => 'add']) ?> </li>



    </ul>
</div>
<div class="shelfSections view large-10 medium-9 columns">
    <h2><?= h($shelfSection->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Shelf Name') ?></h6>
            <p><?= h($shelfSection->shelf_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($shelfSection->id) ?></p>
        </div>
    </div>
</div>

<?php
}
?>

