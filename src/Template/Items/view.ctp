<?php echo $this->Html->css('table.css');?>
<?php echo $this->Html->css(['jquery.dataTables.min']); ?>

<?php
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
    $(document).ready(function(){
        $('#users').DataTable();
    });
</script>

<div class="items view large-10 medium-9 columns">

</div><br>

<div id="headers">
    <table>
        <tr>
             <td class="title"><h1><?= h($item->title) ?></h1> <span class="floatRight"><b>Call No: #<?= h($item->call_number) ?></b> </span><br>
                <?php foreach ($item->authors as $author) : ?>
                <?= $this->Html->link($author->author_name. " ; ", ['controller' => 'authors', 'action' => 'view', $author->id]) ?>
                <?php endforeach; ?><em>(Author)</em><br><br>
                <br><br>
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td colspan="3"><h2>Description:</h2>
            <h6><?= ($item->description) ?></h6>
            </td>
        </tr>
        <tr>
            <td colspan="3"><br>
            <h2>Details:</h2>
            <table>
            <tr>
                <td><h3><?= __('Subject(s): ') ?></h3></td>
                <?php foreach ($item->subjects as $subject) : ?>
                <tr><td><h4><?= $this->Html->link($subject->subject_name, ['controller' => 'subjects', 'action' => 'view', $subject->id]) ?> </h4><br></td></tr>

                 <?php endforeach;?>

                                   </tr>

                <tr>
                    <td><h3><?= __('Publisher: ') ?></h3></td>
                    <td><h4><?= $item->publisher->publisher_name ?></h4></td>
                </tr>
                <tr>
                    <td><h3><?= __('Edition: ') ?></h3></td>
                    <td><h4><?= $item->edition ?></h4><br></td>
                </tr>
                <tr>
                    <td><h3><?= __('ISBN: ') ?></h3></td>
                    <td><h4><?= $item->isbn ?></h4><br></td>
                </tr>
                <tr>
                    <td><h3><?= __('Year: ') ?></h3></td>
                    <td><h4><?= $item->year->year_number ?></h4></td>
                </tr>
                <tr>
                    <td><h3><?= __('Item Type: ') ?></h3></td>
                    <td><h4><?= $item->item_type->type_name ?></h4></td>
                </tr>
            </table>
            </td>
        </tr>
    </table>




    <?php  if($status){ ?>

         <div>
                 <h1>Copies</h1>
                 <table  id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                     <thead>
                     <tr>
                         <th>Barcode</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>


                         <tr>
                             <td><?= h($copy->barcode) ?></td>
                             <td><?= h($statuses->item_status) ?></td>
                             <td><?= $this->Html->link(__('Add to Cart'), ['action' => 'addToLoan', $copy->id])?></td>
                         </tr>


                     </tbody>
                 </table>
             </div>
             <?php }

             elseif ($pending) {

                  echo $message;

                  ?>

                 <br>
                 <br>
                <?php  }


            elseif($avail_status == 1){ ?>

                    <div>
                            <h1>Copies</h1>
                            <table  id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($item->item_copies as $itemcopies): ?>
                                    <tr>
                                        <td><?= h($itemcopies->barcode) ?></td>
                                        <td><?= h($itemcopies->item_status->item_status) ?></td>
                                        <?php if ($itemcopies->item_status->id == 1) { ?>
                                        <td><?= $this->Html->link(__('Add to Cart'), ['action' => 'addToLoan', $itemcopies->id])?></td>
                                        <?php }

                                            else {?> <td><?php echo '-' ?></td> <?php }?>
                                    </tr>
                                <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>
                        <?php }

                else {

                     echo 'No copies currently available';

                     ?>

                    <br>
                    <br>
                    <span class="rsvbtn"><?= $this->Html->link(__('Reserve'),['controller'=>'reserves','action' => 'addReserves', $item->id], ['class'=>'rsvbtn-text']) ?><span class="rsvbtn-image"><span></span></span></span>

                   <?php  }  ?>


</div>


