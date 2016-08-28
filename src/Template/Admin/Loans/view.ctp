<div>
    <div class="row">
    <span class="inline"><h1>Loan</h1></span> <em>ID: #<?= $loan->id ?></em>
        <div><br><br>
        <?= $this->Html->link(__('<i class="fa fa-download"></i> Generate PDF'), ['controller' => 'Loans', 'action' => 'viewPdf', $loan->id],['class'=>'btn btn-primary pull-right','escapeTitle'=>false, 'target'=>'_blank']) ?>
        <span class="inline"><h3><?= h($loan->user->given_name) ?> <?= h($loan->user->family_name) ?></h3></span> &nbsp&nbsp Date Borrowed: <?= $loan->date_borrowed ?><br>


<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Call No:</th>
        <th>Barcode</th>
        <th>Title</th>
        <th>Author(s)</th>
        <th>Status</th>
        <th>Due Date</th>
    </tr>
    </thead>

<?php foreach($lic1 as $loan): ?>
    <tr>
        <td><?= h($loan->item_copy->item->call_number) ?></td>
        <td><?= h($loan->item_copy->barcode) ?></td>
        <td><?= h($loan->item_copy->item->title) ?></td>
        <td>
            <?php foreach ($loan->item_copy->item->authors as $author) : ?>
                 <?= h($author->author_name) ?>;
            <?php endforeach; ?>
        </td>
        <td><?= h($loan->loan->return_status->status_name) ?></td>
        <td><?= h($loan->loan->return_date) ?></td>
    </tr>
<?php
endforeach;
?>


</table>





<!--
        <table frame="box" class="loanTable">

         <?php
         $i = 0;
         $x = 1;
         foreach($lic1 as $loan):
             if($i%3==0){
                 echo "<tr>";
             }
             echo "<td width='400px' height='150px'>" ?>
                    <h2><?php echo "Item: " . $x ?></h2>
                    Title: <?= h($loan->item_copy->item->title) ?><br>
                    Author(s): <?php foreach ($loan->item_copy->item->authors as $author) : ?>
                                    <?= h($author->author_name) ?>;
                               <?php endforeach; ?><br>
                    Publisher: <?= h($loan->item_copy->item->publisher->publisher_name) ?><br>
                    Status: <?= h($loan->loan->return_status->status_name) ?>


                    <?php echo "</td>";
             $i++;
             $x++;
             if($i%3==0){
                 echo "</tr>";
             }

         endforeach;
         ?>
         </table>
-->

        </div>
    </div>
</div>
