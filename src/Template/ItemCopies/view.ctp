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
            <td rowspan="2" class="imageWidth"> <img src="../../webroot/css/img/coverUnavailable.png" alt="Unavailable" height="250" width="180"> </td>
            <td class="title"><h1><?= h($item->title) ?></h1> <br>
                <?php foreach ($item->authors as $author) : ?>
                <?= $this->Html->link($author->author_name. " ; ", ['controller' => 'authors', 'action' => 'view', $author->id]) ?>
                <?php endforeach; ?><em>(Author)</em><br>#<?= h($item->barcode_no) ?>
            </td>
            <td rowspan="2" class="imageWidth alignTop">
                <span class="loanbtn"><?= $this->Html->link(__('Add to cart'), ['action' => 'addToLoan', $item->id], ['class'=>'loanbtn-text']) ?><span class="loanbtn-image"><span></span></span></span><br>
                <span class="rsvbtn"><?= $this->Html->link(__('Reserve'), ['action' => 'addReserves', $item->id], ['class'=>'rsvbtn-text']) ?><span class="rsvbtn-image"><span></span></span></span>
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td colspan="3"><h2>Description:</h2>
                <h6><?= ($item->notes) ?></h6>
            </td>
        </tr>
        <tr>
            <td colspan="3"><br>
                <h2>Details:</h2>
                <table>
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
                <!--<h3><?= __('Number of copies: ') ?></h3>
                <h4><?= $item->copies ?></h4><br>-->
            </td>
        </tr>
    </table>

    <div>
        <h1>Copies</h1>
        <table  id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Barcode</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($item->item_copies as $itemcopies): ?>
            <tr class="clickable" data-href="../../itemcopies/view/<?= h($itemcopies->id); ?>">
                <td><?= h($itemcopies->barcode) ?></td>
                <td><?= h($itemcopies->item_status->item_status) ?></td>
                <?php endforeach; ?>
            </tbody>
        </table>

        <script>
            jQuery(document).ready(function($) {
                $("tr.clickable").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>

    </div>
</div>



