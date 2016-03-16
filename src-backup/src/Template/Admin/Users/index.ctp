<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EDV Admin Panel</title>

</head>

<body>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                          <div class="row mt">
                              <div class="col-lg-12">
                                  <div class="content-panel-view">
                                      <div class="col-lg-3 col-md-6">
                                          <div class="panel panel-info">
                                              <div class="panel-heading">
                                                  <div class="row">
                                                      <div class="col-xs-3">
                                                          <i class="fa fa-user fa-5x"></i>
                                                      </div>
                                                      <div class="col-xs-9 text-right">
                                                          <div class="huge">
                                                          <?php
                                                          echo $total_users;
                                                          ?>
                                                          </div>
                                                          <div>New Members</div>
                                                      </div>
                                                  </div>
                                              </div>

                                                  <div class="panel-footer">

                                                      <span class="pull-left"><?= $this->Html->link(__('View New Members'), ['controller' => 'Users','action' => 'viewall']) ?></span>
                                                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                      <div class="clearfix"></div>
                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="col-lg-3 col-md-6">
                                          <div class="panel panel-success">
                                              <div class="panel-heading">
                                                  <div class="row">
                                                      <div class="col-xs-3">
                                                          <i class="fa fa-envelope fa-5x"></i>
                                                      </div>
                                                      <div class="col-xs-9 text-right">
                                                          <div class="huge"><?php echo $user_expiry;?></div>
                                                          <div>Expired Memberships</div>

                                                      </div>
                                                  </div>
                                              </div>
                                              <a href="#">
                                                  <div class="panel-footer">
                                                      <span class="pull-left"><?= $this->Html->link(__('View Expired Memberships'), ['controller' => 'Memberships','action' => 'viewExpired']) ?></span>
                                                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                      <div class="clearfix"></div>
                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="col-lg-3 col-md-6">
                                          <div class="panel panel-warning">
                                              <div class="panel-heading">
                                                  <div class="row">
                                                      <div class="col-xs-3">
                                                          <i class="fa fa-book fa-5x"></i>
                                                      </div>
                                                      <div class="col-xs-9 text-right">
                                                          <div class="huge"><?php echo $loan ?></div>
                                                          <div>Current Loans</div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <a href="#">
                                                  <div class="panel-footer">
                                                     <span class="pull-left"><?= $this->Html->link(__('View Current Loans'), ['controller' => 'Loans','action' => 'viewonloan']) ?></span>
                                                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                      <div class="clearfix"></div>
                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="col-lg-3 col-md-6">
                                          <div class="panel panel-danger">
                                              <div class="panel-heading">
                                                  <div class="row">
                                                      <div class="col-xs-3">
                                                          <i class="fa fa-exclamation-triangle fa-5x"></i>
                                                      </div>
                                                      <div class="col-xs-9 text-right">
                                                          <div class="huge"><?php echo $loan_expiry ?></div>
                                                          <div>Overdue Loans</div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <a href="#">
                                                  <div class="panel-footer">
                                                      <span class="pull-left"><?= $this->Html->link(__('View Overdue Loans'), ['controller' => 'Loans','action' => 'overdue']) ?></span>
                                                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                      <div class="clearfix"></div>
                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row mt">
                              <div class="col-lg-12">
                                  <div class="content-panel-function">
                                      <center><h3>Quick Functions</h3></center>

                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"users", "action" => "add"]); ?>'">
                                              <i class="fa fa-user-plus fa-5x"></i>
                                              <h3>New Member</h3>
                                          </div>
                                          <p> </p>
                                      </div>
                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"items", "action" => "addItem"]); ?>'">
                                              <i class="fa fa-book fa-5x"></i>
                                              <h3>New Item</h3>
                                          </div>
                                          <p> </p>
                                      </div>

                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"items", "action" => "addDeskCopy"]); ?>'">
                                              <i class="fa fa-book fa-5x"></i>
                                              <h3>Add Item Copy</h3>
                                          </div>
                                          <p> </p>
                                      </div>

                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"loans", "action" => "createloan"]); ?>'">
                                              <i class="fa fa-cart-plus fa-5x"></i>
                                              <h3>Loan to Member</h3>
                                          </div>
                                          <p> </p>
                                      </div>

                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"loan_item_copies", "action" => "returnItem"]); ?>'">
                                              <i class="fa fa-undo fa-5x"></i>
                                              <h3>Returns</h3>
                                          </div>
                                          <p> </p>
                                      </div>


                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"users", "action" => "renew"]); ?>'">
                                              <i class="fa fa-credit-card fa-5x"></i>
                                              <h3>Renew Member</h3>
                                          </div>
                                          <p> </p>
                                      </div>
                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"settlements", "action" => "index"]); ?>'">
                                              <i class="fa fa-dollar fa-5x"></i>
                                              <h3>View Payments</h3>
                                          </div>
                                          <p> </p>
                                      </div>
                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"users", "action" => "viewall"]); ?>'">
                                              <i class="fa fa-users fa-5x"></i>
                                              <h3>View Members</h3>
                                          </div>
                                          <p> </p>
                                      </div>
                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"items", "action" => "index"]); ?>'">
                                              <i class="fa fa-database fa-5x"></i>
                                              <h3>View Library</h3>
                                          </div>
                                          <p></p>
                                      </div>
                                      <div class="col-md-2 col-sm-2 box0">
                                          <div class="box1" onclick="location.href='<?php echo $this->Url->build(["prefix"=>"admin", "controller"=>"loan_limits", "action" => "index"]); ?>'">
                                              <i class="fa fa-ban fa-5x"></i>
                                              <h3>Manage Borrow Limit</h3>
                                          </div>
                                          <p> </p>
                                      </div>

                                  </div>
                              </div>
                          </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Additional Info
                                <div class="pull-right">

                                </div>
                            </div>
                            <div class="panel-body">
                                <div>
                                    EDV Email: help@eatingdisorders.org<br>
                                    Phone: 1300 550 236<br><br>
                                    Address:<br>
                                    Level 2, Collingwood Football Club Community Centre<br>
                                    Cnr Lulie and Abbot Street, Abbotsford, 3067 VIC, Australia<br>
                                </div>
                            </div>
                        </div>

            </div>

        </div>
</div>
<br><br><br>

</body>

</html>
