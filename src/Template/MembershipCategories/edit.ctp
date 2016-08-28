<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $membershipCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $membershipCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Membership Categories'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="membershipCategories form large-10 medium-9 columns">
    <?= $this->Form->create($membershipCategory) ?>
    <fieldset>
        <legend><?= __('Edit Membership Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
