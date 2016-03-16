<?php echo $this->Html->css('viewUserAdmin.css');?>
<div>
    <div class="row">
    <span class="inline"><h1>Individual Membership</h1></span> <span class="inline"><em>ID: #<?= h($membership->id) ?></em></span> <span class="inline"><h2>&nbsp&nbsp&nbsp<?= h($membership->status->status_name) ?></h2></span>
        <table>
            <tr style="height:28px;" >
                <td width="140px"><b>Membership Type: </b></td>
                <td><?= h($membership->mem_type->mem_name) ?></td>
            </tr>
            <tr style="height:28px;" >
                <td><b>Member ID: </b></td>
                <td><?= h($membership->user->id) ?></td>
            </tr>
            <tr style="height:28px;" >
                <td><b>Member Name: </b></td>
                <td><?= h($membership->user->given_name) ?> <?= h($membership->user->family_name) ?></td>
            </tr>
            <tr style="height:28px;" >
                <td><b>Email Address: </b></td>
                <td><?= h($membership->user->email_address) ?></td>
            </tr>
            <tr style="height:28px;" >
                <td><b>Phone Number: </b></td>
                <td><?= h($membership->user->phone_number) ?></td>
            </tr>
            <tr style="height:28px;" >
                <td><b>Price: </b></td>
                <td>$<?= h($membership->mem_type->mem_price) ?></td>
            </tr>
            <tr style="height:28px;" >
                <td><b>Join Date: </b></td>
                <td><?= h($membership->join_date) ?></td>
            </tr>
            <tr style="height:28px;" >
                <td><b>Expiry Date: </b></td>
                <td></b><?= h($membership->expiry_date) ?></td>
            </tr>
        </table>
    </div>
    <span class="editButton2"><?= $this->Html->link('<i class="fa fa-edit"></i> Edit Membership', ['controller'=>'memberships', 'action' => 'edit', $membership->id],[ 'escapeTitle' => false]) ?></span>
</div>
