<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Years'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="years form large-10 medium-9 columns">
    <?= $this->Form->create($year) ?>
    <fieldset>
        <legend><?= __('Add Year') ?></legend>
        <?php
            echo $this->Form->input('year_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
