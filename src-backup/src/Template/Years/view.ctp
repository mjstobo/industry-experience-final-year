<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Year'), ['action' => 'edit', $year->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Year'), ['action' => 'delete', $year->id], ['confirm' => __('Are you sure you want to delete # {0}?', $year->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Years'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Year'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="years view large-10 medium-9 columns">
    <h2><?= h($year->id) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($year->id) ?></p>
            <h6 class="subheader"><?= __('Year Number') ?></h6>
            <p><?= $this->Number->format($year->year_number) ?></p>
        </div>
    </div>
</div>
