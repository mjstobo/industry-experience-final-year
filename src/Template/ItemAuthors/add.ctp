<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Item Authors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="itemAuthors form large-10 medium-9 columns">
    <?= $this->Form->create($itemAuthor) ?>
    <fieldset>
        <legend><?= __('Add Item Author') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('author_id', ['options' => $authors]);
        ?>
    </fieldset>

    <table cellpadding='1' width='50%'>
            <?php
            foreach ($authors as $id => $desc)
            {
                echo "<tr>";
                echo "<td class='heading'>".$desc."</td>";
                echo "<td class='data'>";
                echo $this->Form->input("author._ids.$id", ['label'=>'','legend'=>false,'type'=>'checkbox', 'value' => $id]);
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
