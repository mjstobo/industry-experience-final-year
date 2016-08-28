<?php
echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);

if(!$results) {
    if(!$reserve_items){ ?>
       <div class="items index large-10 medium-9 columns">
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
            <h1>Item Reservations</h1>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                     <th>Member ID</th>
                    <th>Title</th>
                    <th>Reserve Date</th>
                    <th>Reserve Expiry</th>

                    <th class="actions"><?= __('Actions') ?></th>


                </tr>
                </thead>
                <tbody>
                <?php foreach ($reserve_items as $item): ?>
                    <tr>
                        <td><?= h($item->user_id); ?></td>
                        <td><?= h($item->item->title); ?></td>
                        <td><?= h($item->date_reserved); ?></td>
                        <td><?= h($item->reserve_expiry); ?></td>
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





