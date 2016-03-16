<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script('/js/ajax.js');
?>

<p>
    <button class="ajax-button"
            data-url="<?php echo $this->Url->build(['controller' => 'loans', 'action' => 'ajax', '_ext' => 'json']) ?>">

        Click Me
    </button>
</p>

<p>
    Result: <div id="target"> </div>
</p>

