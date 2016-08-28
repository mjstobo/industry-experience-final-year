<?php
    echo $this->Html->css(['jquery.dataTables.min']);
    echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
    echo $this->Html->script('/js/ajax.js');
?>

<html>
<?php
if($user->user_type_id == 1)
{

}
elseif($user->user_type_id == 2)
{ ?>
<body onLoad="popup('../../loans/viewPdf/<?= h($loan->id)?>', 'ad')">
<?php
}
?>



<br>
<div class="items index">
    <p>The following items are now on loan to:  <?php echo $user->email_address ?></p>
    <table id="items" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Barcode</th>
            <th>Title</th>
            <th>Author</th>
            <th>Type of Item</th>
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
            <td><?= h($item->item_copy->item->item_type->type_name); ?></td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Return date: <?php echo $returnDate; ?></h3>
</div>

<?= $this->Html->link(__('<i class="fa fa-download"></i> Generate PDF'), ['controller'=>'Loans','action' => 'viewPdf', $loan->id],['class'=>'btn btn-primary pull-right','escapeTitle'=>false, 'target'=>'_blank']) ?>



</body>
</html>



<script>
    $(document).ready(function(){
        $('#items').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false
        } );
    } );
</script>

<script>
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=600,height=500,scrollbars=yes');
return false;
}
</script>