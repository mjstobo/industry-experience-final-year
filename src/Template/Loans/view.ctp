<?php echo $this->Html->css('viewUserAdmin.css');?>

<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
$(document).ready(function(){
 $('#loans').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );
</script>

<div>
    <h3>Current Loan</h3> <br><br> <h2>Due: <?php echo $loan->return_date?></h2>

    <table id="loans" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Barcode</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($loan->item_copies as $itemcopies): ?>

              <td><?= h($itemcopies->barcode) ?></td>
            <td><?= h($itemcopies->item->title) ?></td>
           <td> <?php foreach ($itemcopies->item->authors as $author): ?>
             <?= h($author->author_name) ?>
             <?php endforeach; ?></td>

            <td><?= h($itemcopies->item->publisher->publisher_name) ?></td>




        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

</div>


