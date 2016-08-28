 <?php echo $this->Html->css('viewUserAdmin.css'); ?>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader">Related Items</h4>

    <?php if ($deletable == true)
    { ?>
    <span class="deleteButton"><?= $this->Html->link(__('Delete Author'), ['prefix'=>'admin','controller'=>'authors','action'=>'delete',$id]) ?> </span>
    <?php
    }?>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <tr>
            <th><?= __('Title') ?></th>
            <th><?= __('Edition') ?></th>
            <th><?= __('Isbn') ?></th>
            <th><?= __('Item Type') ?></th>
            <th><?= __('Year Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>

        <?php foreach ($author as $items): ?>

        <tr>
            <td><?= h($items->item->title) ?></td>
            <td><?= h($items->item->edition) ?></td>
            <td><?= h($items->item->isbn) ?></td>
            <td><?= h($items->item->item_type->type_name) ?></td>
            <td><?= h($items->item->year->year_number) ?></td>


            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->item->id]) ?>

            </td>
        </tr>


        <?php endforeach; ?>


    </table>

    </div>
</div>
