<?php
  echo $this->Html->css('viewUserAdmin.css');
echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<script>
    $(document).ready(function(){
        $('#users').DataTable();
    });
</script>

<div>
    <h1>Library Catalogue - Items on Loan</h1>
    <span class="activeButton"><?= $this->Html->link(__('View Available Items'), ['prefix'=>'admin','controller'=>'items','action'=>'viewavailable']) ?> </span>
    <span class="activeButton"><?= $this->Html->link(__('View All Items'), ['prefix'=>'admin','controller'=>'items','action'=>'index']) ?> </span>
    <br><br><br><br>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author(s)</th>
            <th>Year Published </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= h($item->item->title); ?></td>
            <td> <?php foreach ($item->item->authors as $author) : ?>
                <?= h($author->author_name.",  "); ?>
                <?php endforeach; ?></td>
            <td><?= h($item->item->year->year_number) ?></td>

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
