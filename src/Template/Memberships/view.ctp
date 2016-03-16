<h3><?php echo ('Membership Details'); ?> </h3>
<div>
    <div class="row">
        <div>
            <b><h6 class="subheader"><?= __('Membership ID: ') ?></b><?= $this->Number->format($membership->id) ?></h6>
            <b><h6 class="subheader"><?= __('Type: ') ?></b><?= h($membership->mem_type->mem_name) ?></h6>
            <b><h6 class="subheader"><?= __('Email Address: ') ?></b><?= h($membership->user->email_address) ?></h6>
            <b><h6 class="subheader"><?= __('Price: $') ?></b><?= h($membership->mem_type->mem_price) ?></h6>
            <b><h6 class="subheader"><?= __('Join Date: ') ?></b><?= h($membership->join_date) ?></h6>
            <b><h6 class="subheader"><?= __('Expiry Date: ') ?></b><?= h($membership->expiry_date) ?></h6>
        </div>
    </div>
</div>
