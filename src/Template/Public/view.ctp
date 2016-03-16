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
             <td class="title"><h1><?= h($item->title) ?></h1> <br>
                <?php foreach ($item->authors as $author) : ?>
                                <?= h($author->author_name. " , ") ?>
                                                <?php endforeach; ?><em>(Author)</em><br><br>#<?= h($item->call_number) ?>
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
    </div>









