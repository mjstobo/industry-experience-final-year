


<?php echo $this->Html->css('table.css');
echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>
<?php echo $this->Html->css('viewUserAdmin.css');?>

<?php if(!$search){ ?>



 <?= $this->Form->create(null); ?>

<h1>Item Barcode Lookup</h1><br><br>
<fieldset class="row1">
    <p>Scan Barcode: </p>
    <?php echo $this->Form->input('barcode', ['autoFocus' => 'autoFocus', 'label' => 'Barcode:']); ?>
</fieldset>

<div><button class="button">Find Item &raquo;</button></div>

<?= $this->Form->end() ?>


<?php } else if($search) { ?>
<div class="items view large-10 medium-9 columns">

</div><br>


<div id="headers">
    <table>
        <tr>
            <td class="title">
                <h1><?= h($item->item->title) ?></h1> <br>
                <?php foreach ($item->item->authors as $author) : ?>
                <?= $this->Html->link($author->author_name. " ; ", ['controller' => 'authors', 'action' => 'view', $author->id]) ?>
                <?php endforeach; ?><em>(Author)</em><br>
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td colspan="3"><h2>Description:</h2>
                <h6><?= ($item->item->description) ?></h6>
            </td>
        </tr>
        <tr>
            <td colspan="3"><br>
                <h2>Copy Status:</h2>
                <table>
                    <tr>
                        <td><h3><?= __('Loan Status: ') ?></h3></td>
                        <td><h4><?= $item->item_status->item_status ?></h4></td>
                    </tr>

                    <?php if($item->item_status_id == 3){ ?>
                    <tr>
                        <td><h3><?= __('Date Borrowed: ') ?></h3></td>
                        <td><h4><?= $lic->loan->date_borrowed ?></h4><br></td>
                    </tr>
                    <tr>
                        <td><h3><?= __('Due Date: ') ?></h3></td>
                        <td><h4><?= $lic->loan->return_date ?></h4><br></td>
                    </tr>

                    <tr>
                        <td><h3><?= __('Member: ') ?></h3></td>
                        <td><h4><?= $this->Html->link($lic->loan->user->given_name.' '.$lic->loan->user->family_name, ['controller' => 'users', 'action' => 'view', $lic->loan->user->id]) ?></h4></td>
                    </tr>

                    <?php } else { ?>

                    <tr>
                        <td><h3><?= __('Call Number: ') ?></h3></td>
                        <td><h4><?= $item->item->call_number ?></h4><br></td>
                    </tr>

                    <?php } ?>

                </table>

        </tr>

    </table>
</div>

<?php if($item->item_status_id == 3){ ?>

<span class="addButton"><?= $this->Html->link('Return', ['prefix'=>'admin','controller'=>'items','action'=>'returns', $item->id]) ?> </span>

<?php
}
} ?>