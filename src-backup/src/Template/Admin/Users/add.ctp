<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="../../webroot/js/control.js"></script>
<script type="text/javascript" src="../../webroot/js/jquery.inputmask.js"></script>
<script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>
<?php echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css'); ?>

<link type="text/css" href="../../webroot/css/adminPanel/custom.css" rel="stylesheet" media="all" />


    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="x_panel">
                <?= $this->Form->create($user, ['class'=>'register','novalidate' => true]); ?>
                    <div class="x_title">
                        <span class="inline"><h1>Member Registration</h1></span>  *Required Fields <br>

                    <div class="x_title">
                        <h2>Account Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('user_type_id',['class' => 'form-control','empty' => 'Account Type*', 'label' => false]); ?>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback" onclick="Show_Div(membershipType)">
                            <?php echo $this->Form->input('mem_type_id', ['options' => $memberships, 'class' => 'form-control', 'label'=>false, 'empty' => 'Membership Type *']);?>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback" onclick="Show_Div(email)">
                                <?php echo $this->Form->input('email_address', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Email Address *']); ?>
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" onclick="Show_Div(password)">
                            <?php echo $this->Form->input('password', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Password *']); ?>
                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" onclick="Show_Div(confirmPassword)">
                            <?php echo $this->Form->input('confirm_password', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Confirm Password *','type'=>'password']); ?>
                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="x_title">
                        <h2>Personal Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" name="Personal" >

                         <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php echo $this->Form->input('salutation_id', ['options' => $salutations, 'class' => 'form-control', 'empty' => 'Title *', 'first' => ' ', 'id'=>'width', 'label' => false]); ?>
                         </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('given_name', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'First Name *']); ?>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('family_name', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Last Name *']); ?>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('street_address', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Address *']); ?>
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('suburb', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Suburb *']); ?>
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('postcode', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Postcode *']); ?>
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                             <?php echo $this->Form->input('state_id', ['options' => $states,'class' => 'form-control', 'empty' => 'State *', 'first' => ' ','label' => 'State *', 'id'=>'width', 'label' => false]); ?>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('country_id', ['options' => $countries, 'class' => 'form-control', 'empty' => 'Country *', 'label' => false]); ?>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('phone_number', ['class' => 'form-control has-feedback-left','label' => false,'placeholder'=>'Phone Number *']); ?>
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="x_title">
                        <h2>Further Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('gender_id', ['options' => $genders, 'class' => 'form-control', 'empty' => 'Gender *', 'label' => false]);?>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('year_id',['options' => $years, 'class' => 'form-control', 'empty' => 'Year of Birth *', 'label' => false]); ?>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                             <?php echo $this->Form->input('contact_type_id', ['options' => $contactTypes, 'empty' => 'What is your interest in EDV ? *', 'class' => 'form-control', 'label' => false]); ?>
                        </div>
                    </div>

                    <div class="x_title">
                        <h2>Organisation Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" name="org_name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Organisation Name">
                            <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="x_title">
                        <h2>Newsletter and Payment</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <?php echo $this->Form->input('payment',['options' => $methods, 'class' => 'form-control', 'empty' => 'Payment Method *', 'label' => false]); ?>
                        </div>
                        <div class="col-md-12 col-sm-9 col-xs-12 form-group has-feedback">
                              <?php echo $this->Form->input('newsletter', ['type'=>'checkbox','label'=>' I would like to receive EDV newsletters', 'class'=>'flat']);?>
                        </div>
                    </div>


                    <div class="x_title">
                        <h2>Additional Notes</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-9 col-xs-12 form-group has-feedback">
                            <label for="message">Admin Notes (100 char max) :</label>
                            <textarea id="message" required="required" class="form-control" name="notes" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                        </div>
                    </div>

                    <button class="button">Add Member &raquo;</button></div>
                <?= $this->Form->end() ?>
                <br><br><br><br><br><br><br><br>
            </div>


        </div>
    </div>

<?php echo $this->Html->script('/js/adminPanel/jquery.min.js'); ?>
