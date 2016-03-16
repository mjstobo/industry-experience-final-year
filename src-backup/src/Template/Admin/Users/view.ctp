<?php echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css'); ?>
<?php echo $this->Html->css('viewUserAdmin.css');?>

<div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">

                                            <div id="crop-avatar">
                                                <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                                                                <div class="modal-body">
                                                                    <div class="avatar-body">


                                                                        <div class="row avatar-btns">
                                                                            <div class="col-md-9">
                                                                                <div class="btn-group">
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                                                                </div>
                                                                                <div class="btn-group">
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                                                                    <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="modal-footer">
                                                  <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                </div> -->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal -->

                                                <!-- Loading state -->
                                                <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                            </div>
                                            <!-- end of image cropping -->

                                            <div align="left">
                                                    <?php if ($status)
                                                    { ?>
                                                    <span class="deleteButton"><?= $this->Html->link('Make Inactive', ['prefix'=>'admin','controller'=>'users','action'=>'inactive',$user->id]) ?> </span>


                                                   <?php }

                                                   elseif(!$status)
                                                   {?>
                                                   <span class="activeButton"><?= $this->Html->link('Make Active', ['prefix'=>'admin','controller'=>'users','action'=>'active',$user->id]) ?> </span>

                                                  <?php }?>
                                            </div>
                                            <br><br><br>

                                        </div>
                                        <h1><?= h($user->salutation->salutation_name) ?> <?= h($user->given_name) ?> <?= h($user->family_name)?></h1>
                                        <br>
                                        <ul class="list-unstyled user_data">
                                            <li>
                                            <b>Address: </b><br>
                                            <?= h($user->street_address) ?>,  <?= h($user->suburb) ?><br>
                                            <?= h($user->state->state_name) ?> <?= h($user->postcode) ?><br>
                                            <?= h($user->country->country_name) ?>
                                            </li>
                                            <br>
                                            <li>
                                                <b>Gender:</b> <?= h($user->gender->gender_type) ?>
                                            </li>

                                            <li>
                                                <b>Year of Birth:</b> <?= h($user->year->year_number) ?>
                                            </li>

                                            <li>
                                                <b>Contact Type:</b> <?= h($user->contact_type->contact_types_name) ?>
                                            </li>
                                            <br>

                                            <li>
                                                <b>Email: </b><?= h($user->email_address) ?>
                                            </li>

                                            <li class="m-top-xs">
                                                <b>Ph: </b><?= h($user->phone_number) ?>
                                            </li>

                                        </ul>
                                        <br>
                                        <br>

                                        <h5>Notes:</h5>

                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <?= h($user->notes) ?>
                                            </li>
                                        </ul>
                                        <br>
                                        <span class="editButton3"><?= $this->Html->link('<i class="fa fa-edit"></i> Edit Profile', ['controller'=>'users', 'action' => 'edit', $user->id],['escapeTitle' => false]) ?></span>&nbsp&nbsp<br><br>
                                        <span class="editButton2"><?= $this->Html->link('<i class="fa fa-key"></i> Change Password', ['controller'=>'users', 'action' => 'editpassword', $user->id],[ 'escapeTitle' => false]) ?></span><br><br>
                                        <span class="editButton2"><?= $this->Html->link('<i class="fa fa-plus"></i> New Membership', ['controller'=>'memberships', 'action' => 'add', $user->id],[ 'escapeTitle' => false]) ?></span><br><br>
                                        <span class="editButton2"><?= $this->Html->link('<i class="fa fa-credit-card"></i> Renew Membership', ['controller'=>'users', 'action' => 'renewconfirm', $user->id],[ 'escapeTitle' => false]) ?></span> &nbsp&nbsp

                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">



                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Membership History</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Loan History</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Payments</a>
                                                </li>
                                                 <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Reserves</a>
                                                   </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">


                                                <!-- start Membership History -->
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                <?php if($user->memberships){ ?>
                                                        <table class="table table-striped table-hover">
                                                            <tr>
                                                                <th>Membership ID</th>
                                                                <th>Join Date</th>
                                                                <th>Expiry Date</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            <tr>
                                                            <?php foreach($user->memberships as $members): ?>
                                                            <tr class="clickable" data-href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"memberships", "action" => "view", $members->id]); ?>">
                                                                <td><?= h($members->id) ?></td>
                                                                <td><?= h($members->join_date) ?></td>
                                                                <td><?= h($members->expiry_date) ?></td>
                                                                <td><?= h($members->status->status_name) ?></td>
                                                                <td><?= $this->Html->link('Edit', ['controller' => 'memberships', 'action' => 'edit', $members->id]) ?></td>
                                                            <?php  endforeach; }
                                                            else {
                                                            echo "Member has no memberships."; } ?>
                                                            </tr>
                                                            </table>
                                                </div>
                                                <!-- end membership history-->


                                                <!-- start Loan History -->
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <?php if($loans){ ?>
                                                        <table class="table table-striped table-hover">
                                                            <tr>
                                                                <th>Loan ID</th>
                                                                <th>Date Borrowed</th>
                                                                <th>Loan Status</th>
                                                                <th>Due Date</th>
                                                            <tr>
                                                            <?php foreach($loans as $loan): ?>
                                                            <tr class="clickable" data-href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"loans", "action" => "view", $loan->id]); ?>">
                                                                <td><?= h($loan->id) ?></td>
                                                                <td><?= h($loan->date_borrowed) ?></td>
                                                                <td><?= h($loan->return_status->status_name) ?></td>
                                                                <td><?= h($loan->return_date) ?></td>
                                                            <?php  endforeach; }
                                                            else {
                                                            echo "Member has no loans."; } ?>
                                                            </tr>
                                                            </table>
                                                </div>


                                                <!-- start payments -->
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                <?php if($user->settlements){ ?>
                                                        <table class="table table-striped table-hover">
                                                            <tr>
                                                                <th>Payment ID</th>
                                                                <th>Payment Date</th>
                                                                <th>Payment Type</th>
                                                                <th>Amount</th>
                                                                <th>Payment Method</th>
                                                            <tr>
                                                            <?php foreach($user->settlements as $payment): ?>
                                                            <tr class="clickable" data-href="<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"settlements", "action" => "view", $payment->id]); ?>">
                                                                <td><?= h($payment->id) ?></td>
                                                                <td><?= h($payment->payment_date) ?></td>
                                                                <td><?= h($payment->payment_type->pay_type_name) ?></td>
                                                                <td>$<?= h($payment->amount) ?></td>
                                                                <td><?= h($payment->payment_method->method_name) ?></td>
                                                            <?php  endforeach; }
                                                            else {
                                                            echo "Member has no payments."; } ?>
                                                            </tr>
                                                            </table>
                                                </div>
                                                <!-- end payments-->

                                                 <!-- start reserves -->
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                                <?php if($resStatus){ ?>
                                                        <table class="table table-striped table-hover">
                                                            <tr>
                                                                <th>Reserve ID</th>
                                                                <th>Item Title</th>
                                                                <th>Status</th>
                                                                <th>Date Requested</th>
                                                                <th>Start Reservation</th>
                                                                <th>End Reservation</th>

                                                            <tr>
                                                            <?php foreach($reserve as $reserves): ?>
                                                            <tr>
                                                                <td><?= h($reserves->id) ?></td>
                                                                <td><?= h($reserves->item->title) ?></td>
                                                                <td><?= h($reserves->reserve_status->status_name) ?></td>
                                                                <td><?= h($reserves->request_date) ?></td>
                                                                <td><?= h($reserves->reservation_date) ?></td>
                                                                <td><?= h($reserves->end_date) ?></td>
                                                            </tr>
                                                            <?php  endforeach; }
                                                            else {
                                                            echo "Member has no reserves."; } ?>
                                                            </tr>
                                                            </table>
                                                </div>
                                                <!-- end reserves-->


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $("tr.clickable").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>