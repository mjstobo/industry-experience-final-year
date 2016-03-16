<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="../../webroot/js/control.js"></script>
<link type="text/css" href="../../webroot/css/formAdminUser.css" rel="stylesheet" media="all" />
<?php
  echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
?>

<div>
    <?= $this->Form->create(); ?>

    <h1>Return Items</h1><br><br>
    <fieldset class="row1">
        <p>Enter the Item's Barcode:</p>
    <?php echo $this->Form->input('barcode', ['label' => 'Barcode:','class'=>'barcode']); ?>
    </fieldset>


    <div><button class="button">Find Records &raquo;</button></div>

    <?= $this->Form->end() ?>
</div>
