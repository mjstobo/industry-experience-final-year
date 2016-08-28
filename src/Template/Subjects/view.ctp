<div class="related row">
    <div class="column large-12">
    <h4 class="subheader">Related Items</h4><br>

    <table width ="100%" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <tr>

            <th><?= __('Title') ?></th>
            <th><?= __('Edition') ?></th>
            <th><?= __('Item Type') ?></th>
            <th><?= __('Year') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>

        <?php foreach ($subject as $items): ?>

        <tr>

            <td><?= h($items->item->title) ?></td>
            <td><?= h($items->item->edition) ?></td>
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
