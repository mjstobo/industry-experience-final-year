<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php echo $this->Html->script('control.js'); ?>
<?php echo $this->Html->css('form.css'); ?>
<?php echo $this->Html->css('tooltip.css'); ?>

<div class="container">
    <?= $this->Form->create('extend',['class'=>'register']); ?>

    <h1>Extend Membership</h1>

    <fieldset class="row">

        <h2>You are currently have an active: <?php echo $currMem->mem_type->mem_name; ?> membership. </h2>
        <br>
        Your current membership will expire on: <?php echo $currMem->expiry_date; ?>
        <br>
        <br>
        <p>
            <?php echo $this->Form->input('mem_type_id', ['options' => $memberships, 'class' => 'optMem', 'empty' => ' ','label'=>'I would like to extend for: ']);
            echo $this->Form->hidden('status_id', ['value' => 1]);
            echo $this->Form->hidden('duration_id', ['value' => 1]);?> <br><br>
        </p>
    </fieldset>

    <br><br>
    <p> *You will be taken to PayPal to process the payment. </p>

    <button class="button">Go To Payment Section &raquo;</button>


    <?= $this->Form->end() ?>

</div>
