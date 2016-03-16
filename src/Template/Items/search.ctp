<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
echo $this->Html->script(['clickable.js']);
?>


<h3><?php echo ('Library Search'); ?> </h3>
<br><br>
<?php echo $this->Form->create('Item',['action' => 'search','type' => 'get']); ?>

<?php echo $this->Form->input('option',['type'=>'select','options'=> $filters, 'label' => false,'empty'=>'Search by..','class'=>'filter']); ?>
<?php echo $this->Form->input('keyword', ['label' => false,'class'=>'keyword','placeholder'=>' Enter search keyword']); ?>
<br><br><br><br>
<center>
<?php echo $this->Form->submit(__('Search Catalogue', true), ['name' => 'Search', 'div' => false,'class'=>'button2']);?>
</center>
<?= $this->Form->end() ?>



<br><br>

<?php if(!$noSearch) { ?>


    <table id="clickable" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author(s)</th>
            <th>Year Published </th>
            <th>No. of Available Copies</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
        <tr href="<?php echo $this->Url->build(["controller"=>"items", "action" => "view", $item->id]); ?>">
            <td><?= h($item->title); ?></td>
            <td> <?php foreach ($item->authors as $author) : ?>
                <?= h($author->author_name.",  "); ?>
                <?php endforeach; ?></td>
            <td><?= h($item->year->year_number) ?></td>
            <td><?php
                    $count = 0;
                    foreach($item->item_copies as $itemcount):{
                    if($itemcount->item_status_id == 1)
                    {
                $count = $count +1;

                }

                } endforeach;
                echo $count;


                ?></td>

            <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>-->
            <?php endforeach; ?>
        </tbody>
    </table>

   <?php } ?>
