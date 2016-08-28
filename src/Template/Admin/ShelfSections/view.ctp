<?php echo $this->Html->css('viewUserAdmin.css');?>

<?php if($deletable == true)
{ ?>

<div class="actions columns large-2 medium-3">
    <h3>Shelf Section View &nbsp&nbsp <span class="editButton3"><?= $this->Html->link('<i class="fa fa-edit"></i> Edit', ['controller'=>'shelf_sections', 'action' => 'edit', $shelfSection->id],['escapeTitle' => false]) ?></span>
        <span class="deleteButton1"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shelfSection->id], ['confirm' => __('Are you sure you want to delete {0}?', $shelfSection->shelf_name)]) ?></span></h3><br>
    <b>Shelf Name: </b><?= h($shelfSection->shelf_name) ?><br>
    <b>Shelf ID: </b><?= $this->Number->format($shelfSection->id) ?>


</div>


<?php
}
?>
<?php if($deletable == false)
{ ?>

<div class="actions columns large-2 medium-3">
    <h3>Shelf Section View &nbsp&nbsp <span class="editButton3"><?= $this->Html->link('<i class="fa fa-edit"></i> Edit', ['controller'=>'shelf_sections', 'action' => 'edit', $shelfSection->id],['escapeTitle' => false]) ?></span></h3><br>
    <b>Shelf Name: </b><?= h($shelfSection->shelf_name) ?><br>
    <b>Shelf ID: </b><?= $this->Number->format($shelfSection->id) ?>


</div>

<?php
}
?>

