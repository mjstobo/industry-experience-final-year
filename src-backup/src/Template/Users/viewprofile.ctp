<link type="text/css" href="../../webroot/css/edit.css" rel="stylesheet" media="all" />
<?php echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css'); ?>
<?php echo $this->Html->css('viewUserAdmin.css');?>
<?php
  echo $this->Html->css(['jquery.dataTables.min']);
  echo $this->Html->script(['jquery-2.1.3.min', 'jquery.dataTables.min']);
  echo $this->Html->script(['clickable.js']);
?>

<h3><?php echo ('Profile'); ?> </h3>
<div>
<br>


                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <div class="x_content">
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">

                                            <div id="crop-avatar">
                                                <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal -->

                                                <!-- Loading state -->
                                                <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                            </div>
                                            <!-- end of image cropping -->

                                        </div>
                                        <span class="inline"><h2><?= h($user->salutation->salutation_name) ?> <?= h($user->given_name) ?> <?= h($user->family_name)?></h2></span>
                                        <span class="editButton inlineFloat"><?= $this->Html->link('<i class="fa fa-edit"></i> Edit', ['controller'=>'users', 'action' => 'edit', $user->id],['class'=>'editButton', 'escapeTitle' => false]) ?></span>
                                        <span class="editButton inlineFloat"><?= $this->Html->link('Renew Membership', ['controller'=>'users', 'action' => 'renew', $user->id],['class'=>'editButton', 'escapeTitle' => false]) ?></span>
                                        <br><br>
                                        <form class="edit">
                                            <fieldset class="col4">
                                                <legend>Address</legend>
                                                <?= h($user->street_address) ?>,  <?= h($user->suburb) ?><br>
                                                <?= h($user->state->state_name) ?> <?= h($user->postcode) ?><br>
                                                <?= h($user->country->country_name) ?><br><br>
                                            </fieldset>
                                        </form><br><br><br><br><br>

                                            <br><br>
                                        <form class="edit">
                                            <fieldset class="col4">
                                                <legend>Additional Information</legend>
                                                <b>Gender:</b> <?= h($user->gender->gender_type) ?><br>
                                                <b>Birth Year:</b> <?= h($user->year->year_number) ?><br>
                                                <b>Contact type:</b> <?= h($user->contact_type->contact_types_name) ?><br><br>
                                            </fieldset>
                                        </form><br><br><br><br><br><br><br>

                                        <form class="edit">
                                                <fieldset class="col4">
                                                    <legend>Contact Information</legend>
                                                    <b>Email Address:</b> <?= h($user->email_address) ?><br>
                                                    <b>Home Phone:</b> <?= h($user->phone_number) ?><br><br>
                                                </fieldset>
                                        </form><br><br><br><br><br>


                                        <br><br><br><br><br>


                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">

                                        <div class="tabs">
                                            <ul class="tab-links">
                                                <li class="active"><a href="#tab1">Membership History</a></li>
                                                <li><a href="#tab2">Loan History</a></li>
                                                <li><a href="#tab3">Payments</a></li>
                                                <div class="notes"><em>Note: Click row for more information</em></div>
                                            </ul>


                                            <div class="tab-content">
                                                <div id="tab1" class="tab active">
                                                <?php if($user->memberships){ ?>
                                                    <table class="table table-striped table-hover" width="100%">
                                                        <tr>
                                                            <th>Membership ID</th>
                                                            <th>Join Date</th>
                                                            <th>Expiry Date</th>
                                                            <th>Status</th>
                                                        <tr>
                                                        <?php foreach($user->memberships as $members): ?>
                                                        <tr href="<?php echo $this->Url->build(["controller"=>"memberships", "action" => "view", $members->id]); ?>">
                                                            <td><?= h($members->id) ?></td>
                                                            <td><?= h($members->join_date) ?></td>
                                                            <td><?= h($members->expiry_date) ?></td>
                                                            <td><?= h($members->status->status_name) ?></td>
                                                        <?php  endforeach; }
                                                        else {
                                                        echo "Member has no Memberships."; } ?>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div id="tab2" class="tab">
                                                <?php if($loans){ ?>
                                                    <table class="table table-striped table-hover" width="100%">
                                                        <tr>
                                                            <th>Loan ID</th>
                                                            <th>Date Borrowed</th>
                                                            <th>Loan Status</th>
                                                            <th>Due Date</th>
                                                        <tr>
                                                        <?php foreach($loans as $loan): ?>
                                                        <tr href="<?php echo $this->Url->build(["controller"=>"loans", "action" => "view", $loan->id]); ?>">
                                                            <td><?= h($loan->id) ?></td>
                                                            <td><?= h($loan->date_borrowed) ?></td>
                                                            <td><?= h($loan->return_status->status_name) ?></td>
                                                            <td><?= h($loan->return_date) ?></td>
                                                        <?php  endforeach; }
                                                        else {
                                                        echo "Member has no Loans."; } ?>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div id="tab3" class="tab">
                                                <?php if($user->settlements){ ?>
                                                    <table class="table table-striped table-hover" width="100%">
                                                        <tr>
                                                            <th>Payment ID</th>
                                                            <th>Date</th>
                                                            <th>Payment Type</th>
                                                            <th>Amount</th>
                                                            <th>Payment Method</th>
                                                        <tr>
                                                        <?php foreach($user->settlements as $payment): ?>
                                                        <tr href="<?php echo $this->Url->build(["controller"=>"settlements", "action" => "view", $payment->id]); ?>">
                                                            <td><?= h($payment->id) ?></td>
                                                            <td><?= h($payment->payment_date) ?></td>
                                                            <td><?= h($payment->payment_type->pay_type_name) ?></td>
                                                            <td>$<?= h($payment->amount) ?></td>
                                                            <td><?= h($payment->payment_method->method_name) ?></td>
                                                        <?php  endforeach; }
                                                        else {
                                                        echo "Member has no Payments."; } ?>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>



<script>
jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});
</script>