<style>
table, td, th {
    border: 0px solid black;
    text-align: left;
}

td {
    height: 40px;

}
</style>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                        <div class="row">
                            <div class="col-xs-12 invoice-header">
                            <span class="invoiceLogo"><img src="../../webroot/css/img/logo.png" alt="Logo" width="120"></span>
                            <div class="invoiceFrom">
                                <br><strong>Eating Disorders Victoria</strong>
                                <span>
                                <br>Level 2, Collingwood Football Club Community Centre
                                <br>Cnr Lulie and Abbot Street, Abbotsford, 3067 VIC, Australia
                                <br>Ph: 1300 550 236  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp E: edv@eatingdisorders.org.au
                                <br>
                                <br>ABN:24010832192
                                <br> Charity Reg No: DGR 900224708
                                </span>
                            </div><br><br><br>
                            <h1><center><span style="font-size: 29px">Receipt</span></center></h1><br>
                            <span class="pull-right">Date: <?php echo date("d/m/Y") ?></span>
                            <br><br>
                            <small class="pull-right">Invoice #<?= h($settlement->id); ?></small><br><br>
                            </div>

                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                To <br>  <small class="pull-right">User ID: #<?= h($settlement->user->id); ?></small><br>
                                <strong><?= h($settlement->user->given_name)." ".h($settlement->user->family_name) ?></strong>  <small class="pull-right">Membership ID: #<?= h($settlement->user->memberships[0]->id); ?></small>
                                <br><?= h($settlement->user->street_address) ?>
                                <br><?= h($settlement->user->suburb). ", " . h($settlement->user->postcode) ?>
                                <br><?=  h($settlement->user->state->state_name). ", " . h($settlement->user->country->country_name) ?>
                                <br>Phone: <?= h($settlement->user->phone) ?>
                                <br>Email: <?= h($settlement->user->email_address) ?>
                            </div>
                        </div>


                        <br><br><br>
                        <div class="row">
                            <div class="col-xs-12 table">
                                <table width="100% border="1">
                                    <tr>
                                        <th>Qty</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
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
                                </table>
                            </div>
                        </div>

                        <br><br><br>
                        <div class="row">
                            <div class="col-xs-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="../../webroot/css/img/visa.png" alt="Visa">
                                <img src="../../webroot/css/img/mastercard.png" alt="Mastercard">
                                <img src="../../webroot/css/img/american-express.png" alt="American Express">
                                <img src="../../webroot/css/img/paypal2.png" alt="Paypal">
                            </div>
                            <br><br><br><br>
                            <div class="pull-right">
                                <b>Date Paid:</b> <?= h($settlement->payment_date) ?>
                                <div class="table-responsive">
                                    <table class="table" border="0px">
                                            <tr>
                                                <th style="width:50%">Method:</th>
                                                <td><?= h($settlement->payment_method->method_name) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td><?= h("$"."".$settlement->amount . ".00") ?> </td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br><br>


                            <div class="col-xs-12">
                                <span class="pdfButton"><?= $this->Html->link(__('<i class="fa fa-download"></i> Generate PDF'), ['controller' => 'settlements', 'action' => 'viewPdf', $settlement->id],['escapeTitle'=>false, 'target'=>'_blank']) ?></span>
                            </div>
                </div>
            </div>
        </div>
    </div>
