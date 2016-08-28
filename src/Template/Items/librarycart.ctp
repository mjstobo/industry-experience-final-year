<link type="text/css" href="../webroot/css/edit.css" rel="stylesheet" media="all" />
<h3><?php echo ('Library Cart'); ?> </h3>
<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);


if(!$isEmpty){
    if(!$cart_items){ ?>
       <div class="items index large-10 medium-9 columns">
            <?php echo $cart_status ?>
        </div>
    <?php } else { ?>

<script>
    $(document).ready(function(){
        $('#items').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false
        } );
    } );
</script>
<br>
<div class="items index">
    <p>Items currently in cart:</p>
    <table id="items" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Barcode</th>
            <th>Title</th>
            <th>Author</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart_items as $item): ?>
        <tr>
            <td><?= h($item->item_copy->barcode); ?></td>
            <td><?= h($item->item_copy->item->title); ?></td>
            <td> <?php foreach($item->item_copy->item->authors as $authors):
                echo $authors->author_name.", ";
                endforeach; ?> </td>
            <td class="actions">
                <?= $this->Form->postLink(__('Remove'), ['action' => 'remove', $item->id], ['confirm' => __('Are you sure you want to remove '. $item->item_copy->item->title.' from your cart ?')]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<br>

<span class="loanButton"><?php echo $this->Html->link('Borrow / Reserve Items', ['controller' => 'Items', 'action' => 'confirm', $loan_id]); ?></span>

<?php
    }
} else if($isEmpty) {
    if (!$cart_items) {
        ?>
        <div class="items index large-10 medium-9 columns">
            <h1> Library Cart </h1>
            <?php echo $cart_status ?>
        </div>

    <?php }
}?>
