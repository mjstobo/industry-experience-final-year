<?php echo $this->Html->css('viewUserAdmin.css'); ?>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader">Related Items for <em><?= h($subject->subject_name) ?></em></h4><br>
     <?php if ($deletable == true)
        { ?>
        <span class="deleteButton"><?= $this->Html->link(__('Delete Subject'), ['prefix'=>'admin','controller'=>'subjects','action'=>'delete',$id]) ?> </span>
        <?php
        }?>

    <?php if (!empty($subject->items)): ?>
    <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <tr>
            <th><?= __('Title') ?></th>
            <th><?= __('Edition') ?></th>
            <th><?= __('Isbn') ?></th>
            <th><?= __('Item Type') ?></th>
            <th><?= __('Year Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($subject->items as $items): ?>
        <tr>
            <td><?= h($items->title) ?></td>
            <td><?= h($items->edition) ?></td>
            <td><?= h($items->isbn) ?></td>
            <td><?= h($items->item_type->type_name) ?></td>
            <td><?= h($items->year->year_number) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
