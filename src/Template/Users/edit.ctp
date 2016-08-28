<link type="text/css" href="../../webroot/css/edit.css" rel="stylesheet" media="all" />
<?php echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css'); ?>
<?php echo $this->Html->css('viewUserAdmin.css');?>

<div class="users form large-10 medium-9 columns">
<h3><?php echo ('Edit Profile'); ?> </h3>

    <?= $this->Form->create($user, ['class'=>'edit','novalidate' => true]); ?>

    <fieldset class="col4">
        <legend>User Login</legend><span class="editButton inlineFloat"><?= $this->Html->link('<i class="fa fa-key"></i> Edit Password', ['controller'=>'users', 'action' => 'editpassword', $user->id],['class'=>'editButton', 'escapeTitle' => false]) ?></span>
    	<?php
            echo "<p>";echo $this->Form->input('email_address');echo "</p>"; ?>
            <span class="password"><?php   echo "<p>"; echo $this->Form->input('current_password',['label' => 'Current Password *','type'=>'password']); echo "</p>";  ?>
            <!--<span class="password"><?php   echo "<p>"; echo $this->Form->input('password',['label' => 'Password *','value' => '']); echo "</p>";  ?>
            <span class="confirm"><?php   echo $this->Form->input('confirm_password',['label' => 'Confirm Password*', 'type'=>'password']); ?>-->
   </fieldset>

    <fieldset class="col1">
        <legend>Personal Details</legend>
        <?php
            echo "<p>";echo $this->Form->input('salutation_id', ['options' => $salutations]);echo "</p>";
            echo "<p>";echo $this->Form->input('contact_type_id', ['options' => $contactTypes, 'class' => 'optContType']);echo "</p>";
            echo "<p>";echo $this->Form->input('gender_id', ['options' => $genders]);echo "</p>";
            echo "<p>";echo $this->Form->input('given_name');echo "</p>";
            echo "<p>";echo $this->Form->input('family_name');echo "</p><br>";
            echo "<p>";echo $this->Form->input('year_id',['options' => $years,'label' => 'Year Of Birth', 'empty' => true,'placeholder' => 'Select a year']); echo "</p>";
            echo $this->Form->input('phone_number');
            echo "<br>";
            echo "<br>";
        ?>
    </fieldset>


    <fieldset class="col2">
		<legend>Address</legend>
		<?php
            echo "<p>";echo $this->Form->input('street_address');echo "</p>";
            echo "<p>";echo $this->Form->input('suburb');echo "</p>";
            echo "<p>";echo $this->Form->input('postcode');echo "</p>";
            echo "<p>";echo $this->Form->input('state_id', ['options' => $states, 'class' => 'optState']);echo "</p>";
            echo "<p>";echo $this->Form->input('country_id', ['options' => $countries, 'class' => 'optState']);echo "</p>";
        ?>
	</fieldset>


    <fieldset class="col3">
		<legend>Organisation</legend><br>
		<?php
            echo "<p>";echo $this->Form->input('org_name', ['label'=>'Organisation Name']);echo "</p>"
        ?>
	</fieldset>


    <div><button class="button">Save &raquo;</button></div>
    <?= $this->Form->end() ?>

</div>