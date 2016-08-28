<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="../../webroot/js/control.js"></script>
<link type="text/css" href="../../webroot/css/formAdminUser.css" rel="stylesheet" media="all" />
<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<?php if(!$result) { ?>
<div>
   <h3>There are no Damaged Items</h3>
</div>

<?php } else { ?>

<?php echo $this->Html->css('viewUserAdmin.css');?>

<div>
    <script>
        $(document).ready(function(){
            $('#users').DataTable( {
                "searching":   false
            } );
        } );
    </script>

    <div>
        <br>
        <h1>Damaged Items</h1>
        <br>
        <br>
        <br>
        <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
            <tr><th>Barcode</th>
                <th>Title</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($itemCopies as $item) :{ ?>
            <tr>
                <td><?= h($item->barcode) ?></td>
                <td><?= h($item->item->title) ?></td>
                <td> <?php foreach ($item->item->authors as $author): ?>
                 <?= h($author->author_name) ?></td>
                  <?php endforeach; } ?>
               <td> <?= $this->Html->link(__('View Item'), ['action' => 'view', $item->id]) ?></td>

            </tr>

            <?php endforeach; } ?>
            </tbody>
        </table>

    </div>

</div>

`