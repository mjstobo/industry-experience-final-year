<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);


if($status){

?>

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
<div class="items index large-10 medium-9 columns">
    <h1>Library Cart</h1>
    <table id="items" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>

            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart_items as $item): ?>
        <tr>
            <td><?= h($item->item->title); ?></td>
            <td> <?= h($item->item->author->author_name); ?> </td>
            <td class="actions">
                <?= $this->Form->postLink(__('Remove'), ['action' => 'remove', $item->id], ['confirm' => __('Are you sure you want to remove '. $item->item->title.' from your cart ?')]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

</div>
<br>
<div>
    <?php echo $this->Html->link(
    'Loan Items &raquo;', ['controller' => 'Items', 'action' => 'librarycart'], ['class' => 'button']
    ); ?>
    <button class="button">Reserve Items &raquo;</button></div>

<?php } else { ?>
<div class="items index large-10 medium-9 columns">
    <h1> Library Cart </h1>
    <?php echo $cart_status ?>
</div>

<?php } ?>

