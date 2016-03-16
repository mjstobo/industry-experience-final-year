<?php echo $this->Form->create('Item',['action' => 'search']);

echo $this->Form->input('option',['type'=>'select','options'=> $filters, 'label' => 'Filter: ','empty'=>' ']);
echo $this->Form->input('keyword', ['label' => 'Keyword: ']);

    echo $this->Form->submit(__('Search Catalogue', true), ['name' => 'Search', 'div' => false]);?>
<?= $this->Form->end() ?>

