<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php echo $this->Html->css('formAdminUser.css'); ?>
<?php
    echo $this->Html->css(['jquery.dataTables.min']);
echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
echo $this->Html->css('viewUserAdmin.css');
echo $this->Html->script('/js/ajax.js');
?>


<div class="container">
    <?=
                $this->Form->create(); ?>

    <h1>Renew Membership</h1><br><br>

    <div>
        <br>
        <div class="row">
            <div>
                <div class="x_panel">

                    <div class="x_content">
                        <div>
                            <div class="profile_img">
                                <span class="inline"><h3><?= h($user->salutation->salutation_name) ?> <?= h($user->given_name) ?> <?= h($user->family_name)?></h3></span>
                                <br><br>


                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Address</legend>
                                        <?= h($user->street_address) ?>,  <?= h($user->suburb) ?><br>
                                        <?= h($user->state->state_name) ?> <?= h($user->postcode) ?><br>
                                        <?= h($user->country->country_name) ?><br><br>
                                    </fieldset>
                                </div>
                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Additional Information</legend>
                                        <b>Gender:</b> <?= h($user->gender->gender_type) ?><br>
                                        <b>Birth Year:</b> <?= h($user->year->year_number) ?><br>
                                        <b>Contact type:</b> <?= h($user->contact_type->contact_types_name) ?><br><br>
                                    </fieldset>
                                </div>
                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Contact Information</legend>
                                        <b>Email Address:</b> <?= h($user->email_address) ?><br>
                                        <b>Home Phone:</b> <?= h($user->phone_number) ?><br><br><br>
                                    </fieldset>
                                </div>
                                <div class="inline processBox">
                                    <fieldset>
                                        <legend>Membership Information</legend>
                                        <?php if($membershipStatus){ ?>
                                        <b>Membership Type:</b> <?= h($user->memberships[0]->mem_type->mem_name) ?><br>
                                        <b>Expiry Date:</b> <?= h($user->memberships[0]->expiry_date) ?><br>
                                       <?php } else { ?>
                                        <b> Inactive. </b>
                                      <?php  } ?><br><br>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <fieldset class="row">

        <legend>Membership Type</legend>
        <table>
            <tr>
                <td width="130px"><b>Membership Type: </b></td>
                <td><?php echo $this->Form->input('mem_type_id', ['options' => $memberships, 'class' => 'optMem','label'=>false]);
                                echo $this->Form->hidden('status_id', ['value' => 1]);
                                echo $this->Form->hidden('duration_id', ['value' => 1]);
                                echo $this->Form->hidden('join_date', ['value' => date('Y-m-d')]);
                                echo $this->Form->hidden('expiry_date', ['value' => date('Y-m-d', strtotime('+1 year'))]); ?>
                </td>
            </tr>
            <tr>
                <td><b>Payment Type: </b></td>
                <td><?php echo $this->Form->select('payment_type', ['options'=> $payment]); ?></td>
            </tr>
        </table>


    </fieldset>

    <br>

    <button class="button">Confirm Payment &raquo;</button>


    <?= $this->Form->end() ?>

</div>
    </div>
