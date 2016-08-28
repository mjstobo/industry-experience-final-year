<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php echo $this->Html->script('control.js'); ?>
<?php echo $this->Html->css('form.css'); ?>

<div class="container">
    <?=
                $this->Form->create(); ?>

    <h1>Renew Membership</h1>

    <fieldset class="row">

        <legend>Membership Type</legend>
        <p>
            <?php echo $this->Form->input('mem_type_id', ['options' => $memberships, 'class' => 'optMem', 'empty' => ' ','label'=>'I would like to join for: ']);
            echo $this->Form->hidden('status_id', ['value' => 1]);
            echo $this->Form->hidden('duration_id', ['value' => 1]);
            echo $this->Form->hidden('join_date', ['value' => date('Y-m-d')]);
            echo $this->Form->hidden('expiry_date', ['value' => date('Y-m-d', strtotime('+1 year'))]);?> <br><br>
        </p>
    </fieldset>

    <button class="button">Go To Payment Section &raquo;</button>


    <?= $this->Form->end() ?>

</div>
