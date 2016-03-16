<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
    $(document).ready(function(){
        $('#users').DataTable();
    });
</script>

<h3><?php echo ('My Reserves'); ?> </h3>


<?php
if(!$results) {
    if(!$reserve_items){ ?>
       <div>
            <h1> Item Reserves </h1>
            <?php echo $reserve_status ?>
        </div>
    <?php }

    else { ?>

        <script>
            $(document).ready(function(){
                $('#items').DataTable( {
                    "paging":   false,
                    "ordering": false,
                    "info":     false
                    "search": false,
                } );
            } );
        </script>
        <br>
        <div class="">
            <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Reserve Date</th>
                    <th>Reserve Expiry</th>
                    <th>Status</th>

                    <th class="actions"><?= __('Actions') ?></th>


                </tr>
                </thead>
                <tbody>
                <?php foreach ($reserve_items as $item): ?>
                    <tr>
                        <td><?= h($item->item->title); ?></td>
                        <td><?= h($item->reservation_date); ?></td>
                        <td><?= h($item->end_date); ?></td>
                        <td><?= h($item->reserve_status->status_name); ?></td>
                         <td><?= $this->Html->link(__('Remove'), ['action' => 'removeReserves', $item->id],['confirm' => __('Are you sure you want to remove '. $item->item->title.' from your Reserves ?')]) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
            }
        } else if($results) {

                ?>
                <div class="items index large-10 medium-9 columns">
                    <h1> Item Reserves </h1>
                    <?php echo $reserve_status ?>
                </div>

            <?php
        }?>





