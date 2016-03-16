<?php echo $this->Html->script('tabs');?>
<?php echo $this->Html->css('formAdminEditUser');?>
<div class="users form large-10 medium-9 columns">

   <?= $this->Form->create($user, ['class'=>'edit','novalidate' => true]); ?>
   <span class="floatRight"> ID: #<?= h($user->id) ?></span>
   <h1>Edit Member</h1>

   <div style="width: auto; margin: 0 auto;">
       <div class="tabcontents">
           <div id="view1">
               <legend>Change Login Details</legend>
               <?php echo $this->Form->input('email_address',['label' => 'Email Address','class'=>'inputwidth']); ?><br><br>

               <legend>Personal Details</legend>
               <?php
                   echo "<p>";echo $this->Form->input('user_type_id',['label' => 'User Type']); echo "</p>";

                   echo "<p>";echo $this->Form->input('salutation_id', ['options' => $salutations, 'label' => 'Title']);echo "</p>";
                   echo "<p>";echo $this->Form->input('given_name',['label' => 'First Name']);echo "</p>";
                   echo "<p>";echo $this->Form->input('family_name',['label' => 'Last Name']);echo "</p><br>";

                   echo "<p>";echo $this->Form->input('street_address',['label' => 'Address']);echo "</p>";
                   echo "<p>";echo $this->Form->input('suburb',['label' => 'Suburb']);echo "</p>";
                   echo "<p>";echo $this->Form->input('postcode',['label' => 'Postcode']);echo "</p>";
                   echo "<p>";echo $this->Form->input('state_id', ['options' => $states, 'class' => 'optState', 'label'=>'State']);echo "</p>";
                   echo "<p>";echo $this->Form->input('country_id', ['options' => $countries, 'class'=>'optCount', 'label'=>'Country']);echo "</p>";echo "<br>";

                   echo "<p>";echo $this->Form->input('contact_type_id', ['options' => $contactTypes, 'class' => 'optContType']);echo "</p>";
                   echo "<p>";echo $this->Form->input('gender_id', ['options' => $genders]);echo "</p>";
                   echo "<p>";echo $this->Form->input('year_id',['options' => $years,'label' => 'Year of birth', 'empty' => true,'placeholder' => 'Select a year']);echo "</p>";
                   echo "<p>";echo $this->Form->input('phone_number',['label'=>'Phone']);echo "</p>";
                   echo "<p>";echo $this->Form->input('notes',['label'=>'Notes', 'cols'=>'10']);echo "</p>";
                   echo "<br>";echo "<br>";

               ?>
               <span class="organisationWidth"><?php  echo "<p>";echo $this->Form->input('org_name', ['label'=>'Organisation Name']);echo "</p>";  ?> </span>
           </div>
       </div>
   </div>

    <button class="button">Save &raquo;</button>
    <?= $this->Form->end() ?>
    <br><br>

</div>
<br><br>