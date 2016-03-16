<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php echo $this->Html->script('control.js'); ?>
<?php echo $this->Html->css('form.css'); ?>
<?php echo $this->Html->script('tooltip.js'); ?>
<?php echo $this->Html->css('tooltip.css'); ?>
   <div class="container">
                <?=
                $this->Form->create($user, ['class'=>'register', 'novalidate' => true]); ?>

                 <h1>Registration</h1><div id="mandatory">* required fields</div>

                 <fieldset class="row">

                          <legend>Membership Type</legend>
                          <p>
                              <?php echo $this->Form->input('mem_type_id', ['options' => $memberships, 'class' => 'optMem', 'empty' => ' ','label'=>'I would like to join for: ']);
                              echo $this->Form->hidden('status_id', ['value' => 1]);
                                          echo $this->Form->hidden('duration_id', ['value' => 1]);
                                          echo $this->Form->hidden('join_date', ['value' => date('Y-m-d')]);
                                          echo $this->Form->hidden('expiry_date', ['value' => date('Y-m-d', strtotime('+1 year'))]);?>
                          <br><br><br>

                          <?php
                          echo $this->Form->radio('option',[['value' => 'Individual', 'text' => 'Individual', 'class' => 'membership_type', 'name' => 'option'],
                                                            ['value' => 'Organisation', 'text' => 'Organisation', 'class' => 'membership_type', 'name' => 'option']]);
                          echo $this->Form->error('option');
                          ?>
                              <br>
                          </p>
                 </fieldset>

                 <fieldset class="row1">
                    <legend>Account Details</legend>
                 <?php
                        echo "<p>"; echo $this->Form->input('email_address',['label' => 'Email Address *','class'=>'email']);
                        echo "<p>"; echo $this->Form->input('password',['label' => 'Password *']); echo "</p>";
                        echo $this->Form->input('confirm_password',['label' => 'Confirm Password *', 'type'=>'password']);
                 ?>
                 </fieldset><br>

                     <fieldset class="row1">
                                <legend>Personal Details</legend>
                             <?php
                                    echo "<p>"; echo $this->Form->input('salutation_id',['options' => $salutations, 'empty' => ' ','label' => 'Title *']); echo "</p>";
                                    echo $this->Form->input('given_name', ['label' => 'First Name *']);
                                    echo $this->Form->input('family_name', ['label' => 'Last Name *']); echo "</p><br>";
                                    echo $this->Form->input('street_address', ['label' => 'Address *','class'=>'address']);
                                    echo "<p>"; echo $this->Form->input('suburb', ['label' => 'Suburb *']);
                                    echo $this->Form->input('postcode', ['label' => 'Postcode *']);
                                    echo "<p>"; echo $this->Form->input('state_id', ['options' => $states, 'empty' => ' ','label' => 'State *']);
                                    echo $this->Form->input('country_id', ['options' => $countries,'label' => 'Country *']);
                                    echo "<p>"; echo $this->Form->input('phone_number', ['label' =>'Phone *']); echo "</p>";
                             ?>
                             </fieldset>

                            <div id="individual_form">
                            <fieldset class="row1">
                                <legend>Further Information</legend>
                                <p> <?php echo $this->Form->input('gender_id', ['options' => $genders, 'value' => 4]);?></p>
                                <?php echo $this->Form->input('year_id',['options' => $years,'label' => 'Year of birth', 'placeholder' => 'Select a year']); ?>
                                <?php
                                    echo "<p>"; echo $this->Form->hidden('user_type_id', ['options' => $userTypes, 'value'=>2]); echo "</p>";
                                    echo $this->Form->input('contact_type_id', ['options' => $contactTypes, 'empty' => '', 'class' => 'optContact']);;
                                ?>
                            </div>
                            </fieldset>




                             <div id="organisation_form">
                                    <fieldset class="row1">
                                        <legend>Organisation Details</legend>
                                        <?php echo $this->Form->input('org_name', ['label' => 'Organisation Name ']);?>
                                    </fieldset>
                             </div>
                     </fieldset>

                     <br>
                    <fieldset class="row4">
                        <legend>Terms and Mailing</legend>
                            <div class="agreement">
                                <p><?php echo $this->Form->input('newsletter', ['type'=>'checkbox','label'=>'I would like to receive EDV newsletters']);?></p>
                            </div>
                    </fieldset>
                             <button class="button">Go To Payment Section &raquo;</button>
                 </fieldset>


                <?= $this->Form->end() ?>

    </div>
