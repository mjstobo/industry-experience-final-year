<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
    $(document).ready(function(){
        $('#users').DataTable();
    });
</script>

<div>
    <h3><?php echo ('Library Catalogue'); ?> </h3>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author(s)</th>
            <th>Year Published </th>
            <th>No. of Copies</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
        <tr class="clickable" data-href="items/view/<?= h($item->id); ?>">
            <td><?= h($item->title); ?></td>
            <td> <?php foreach ($item->authors as $author) : ?>
                <?= h($author->author_name.",  "); ?>
                <?php endforeach; ?></td>
            <td><?= h($item->year->year_number) ?></td>
            <td><?php
                    $count = 0;
                    foreach($item->item_copies as $itemcount){
                $count = $count + 1;
                }
                echo $count;
                ?></td>

            <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>-->
            <?php endforeach; ?>
        </tbody>
    </table>

</div>


<script>
    jQuery(document).ready(function($) {
        $("tr.clickable").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

