

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <section class="content invoice">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-xs-12 invoice-header">
                                                <h1>
                                        <span class="invoiceLogo"><img src="../../../webroot/css/img/logo.png" alt="Logo" width="120"></span>
                                        <div class="invoiceFrom">
                                        <address>
                                                <strong>Eating Disorders Victoria</strong>
                                                <br>Level 2, Collingwood Football Club Community Centre
                                                <br>Cnr Lulie and Abbot Street, Abbotsford, 3067 VIC, Australia
                                                <br>Ph: 1300 550 236  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp E: mjstobo@gmail.com
                                                <br>
                                                <br>ABN:24010832192
                                                <br> Charity Reg No: DGR 900224708
                                        </address>
                                        </div>
                                        <center>Receipt</center><br>
                                        <small class="pull-right">Date: <?php echo date("d/m/Y") ?></small>
                                    </h1><br><br>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                To
                                        <address>

                                            <strong><?= h($settlement->user->given_name)." ".h($settlement->user->family_name) ?></strong>
                                            <br><?= h($settlement->user->street_address) ?>
                                            <br><?= h($settlement->user->suburb). ", " . h($settlement->user->postcode) ?>
                                            <br><?=  h($settlement->user->state->state_name). ", " . h($settlement->user->country->country_name) ?>
                                            <br>Phone: <?= h($settlement->user->phone) ?>
                                            <br>Email: <?= h($settlement->user->email_address) ?>

                                        </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">

                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                <b>Invoice #<?= h($settlement->id); ?></b>
                                                <br>
                                                <br>
                                                <b>User ID: </b><?= h($settlement->user->id); ?>
                                                <br>
                                                <b>Membership ID: </b><?= h($settlement->user->memberships[0]->id); ?>
                                                <br>

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                        <br><br><br>
                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-xs-12 table">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Qty</th>
                                                            <th>Type</th>
                                                            <th style="width: 59%">Description</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td><?= h($settlement->payment_type->pay_type_name) ?></td>
                                                            <td>
                                                            <?php
                                                            if($settlement->payment_type->pay_type_name =='Postage')
                                                            { echo "Postage for item";}
                                                            else if ($settlement->payment_type->pay_type_name =='Library Fee')
                                                            { echo "Over due book fee";}
                                                            else
                                                            { echo $settlement->user->memberships[0]->mem_type->mem_name; }
                                                            ?>
                                                            </td>
                                                            <td><?= h("$"."".$settlement->amount . ".00") ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-xs-6">
                                                <p class="lead">Payment Methods:</p>
                                                <img src="../../../webroot/css/img/visa.png" alt="Visa">
                                                <img src="../../../webroot/css/img/mastercard.png" alt="Mastercard">
                                                <img src="../../../webroot/css/img/american-express.png" alt="American Express">
                                                <img src="../../../webroot/css/img/paypal2.png" alt="Paypal">

                                            </div>
                                            <!-- /.col -->
                                            <div class="col-xs-6">
                                                <p class="lead">Date Paid: <?= h($settlement->payment_date->i18nFormat('d/MM/yyyy')) ?></p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width:50%">Method:</th>
                                                                <td><?= h($settlement->payment_method->method_name) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td><?= h("$"."".$settlement->amount . ".00") ?> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-xs-12">
                                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                                <?= $this->Html->link(__('<i class="fa fa-download"></i> Generate PDF'), ['controller' => 'Settlements', 'action' => 'viewPdf', $settlement->id],['class'=>'btn btn-primary pull-right','escapeTitle'=>false, 'target'=>'_blank']) ?>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>




<!--
<ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Settlement'), ['action' => 'edit', $settlement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Settlement'), ['action' => 'delete', $settlement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settlement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settlements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Settlement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Types'), ['controller' => 'PaymentTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Type'), ['controller' => 'PaymentTypes', 'action' => 'add']) ?> </li>
    </ul>-->
