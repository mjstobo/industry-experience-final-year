<?php
  echo $this->Html->css('viewUserAdmin.css');
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script(['clickable.js']);
?>


<div>
    <h1>Library Catalogue - All Items</h1>
    <span class="activeButton"><?= $this->Html->link(__('View Available Items'), ['prefix'=>'admin','controller'=>'items','action'=>'viewavailable']) ?> </span>
    <span class="deleteButton"><?= $this->Html->link(__('View Items On Loan'), ['prefix'=>'admin','controller'=>'items','action'=>'viewonloan']) ?> </span>
    <br><br><br><br>
    <table id='clickable' cellpadding="0" cellspacing="0" class="table table-striped table-hover" >
        <thead>
        <tr>
            <th width="350px">Title</th>
            <th>Author(s)</th>
            <th>Subject (s)</th>
            <th>Year Published </th>
            <th>No. of Copies</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
        <tr href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"items", "action" => "view", $item->id]); ?>">
            <td><?= h($item->title); ?></td>
            <td> <?php foreach ($item->authors as $author) : ?>
                <?= h($author->author_name.",  "); ?>
                <?php endforeach; ?></td>
            <td> <?php foreach ($item->subjects as $subject) : ?>
                <?= h($subject->subject_name.",  "); ?>
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
