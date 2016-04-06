<?php echo $this->Html->css('table.css');
      echo $this->Html->css(['jquery.dataTables.min']);
      echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<div class="items view large-10 medium-9 columns">

</div><br>


<div id="headers" class="itemViewWidth">
    <table >
        <tr>
             <td class="title">
                <h1><span class="inline"><?= h($item->title) ?>&nbsp&nbsp</span><span class="editButton buttonFloat"><?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?></span></h1><br>
                <?php foreach ($item->authors as $author) : ?>
                <?= $this->Html->link($author->author_name. " ; ", ['controller' => 'authors', 'action' => 'view', $author->id]) ?>
                                <?php endforeach; ?><em>(Author)</em><br><br><br>
            </td>

        </tr>
        <tr>

        </tr>
        <tr>
            <td colspan="3"><h2>Description:</h2><br>
            <?= ($item->description) ?>
            </td>
        </tr>
        <tr>
            <td colspan="3"><br>
            <h2>Details:</h2>
            <table>
                <tr>
                    <td><h3><?= __('Shelf Category: ') ?></h3></td>
                    <td><?= $item->shelf_section->shelf_name ?></td>
                </tr>

                <tr>
                    <td><h3><?= __('Publisher: ') ?></h3></td>
                    <td><?= $item->publisher->publisher_name ?></td>
                </tr>
                <tr>
                    <td><h3><?= __('Edition: ') ?></h3></td>
                    <td><?= $item->edition ?><br></td>
                </tr>
                <tr>
                    <td><h3><?= __('ISBN: ') ?></h3></td>
                    <td><?= $item->isbn ?><br></td>
                </tr>
                <tr>
                    <td><h3><?= __('Year: ') ?></h3></td>
                    <td><?= $item->year->year_number ?></td>
                </tr>
                <tr>
                    <td><h3><?= __('Item Type: ') ?></h3></td>
                    <td><?= $item->item_type->type_name ?></td>
                </tr>
            </table>

        </tr>
        <tr>
            <td colspan="3"><h2>Notes:</h2><br>
            <?= ($item->notes) ?>
            </td>
        </tr>

    </table>

    <script>
        $(document).ready(function(){
            $('#users').DataTable();
        });
    </script>

    <div>
        <span class="inline2"><h1>Copies</h1></span> &nbsp&nbsp<span class="addButton"><?= $this->Html->link('Add Copy', ['action' => 'addCopy', $item->id]) ?></span>
        <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Barcode</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($item->item_copies as $itemcopies): ?>
            <tr>
                <td><?= h($itemcopies->barcode) ?></td>
                <td><?= h($itemcopies->item_status->item_status) ?></td>
                 <td><?= $this->Html->link(__('Edit'), ['controller'=> 'item_copies','action' => 'edit', $itemcopies->id]) ?></td>
                <?php endforeach; ?>
            </tr>
            </tbody>
        </table>

    </div>
</div>
