<link type="text/css" href="../../webroot/css/edit.css" rel="stylesheet" media="all" />


<div class="viewName">
    <h1><?= h($user->salutation->salutation_name) ?> <?= h($user->given_name) ?>
    <?= h($user->family_name) ?></h1>
</div>

    <button class="delete">Delete</button>



<div class="users form large-10 medium-9 columns">

    <?= $this->Form->create($user, ['class'=>'edit']); ?>

    <fieldset class="col4">
        <legend>User Details</legend>
            <h6 class="subheader"><?= __('Email Address: ') ?></h6>
            <p><?= h($user->email_address) ?><br></p><br>

            <h6 class="subheader"><?= __('User Type: ') ?></h6>
            <p><?= h($user->user_type->user_type_name) ?></p><br>

            <h6 class="subheader"><?= __('Membership ID: ') ?></h6>
            <p><?= h($user->memberships[0]->id) ?></p><br><br>
   </fieldset>

    <fieldset class="col1">
        <legend>Personal Details</legend>

                    <h6 class="subheader"><?= __('First Name: ') ?></h6>
                    <p><?= h($user->given_name) ?></p><br>

                    <h6 class="subheader"><?= __('Last Name: ') ?></h6>
                    <p><?= h($user->family_name) ?></p><br>

                    <h6 class="subheader"><?= __('Gender: ') ?></h6>
                    <p><?= h($user->gender->gender_type) ?></p><br>


                    <h6 class="subheader"><?= __('Phone Number: ') ?></h6>
                    <p><?= h($user->phone_number) ?></p><br>


                    <h6 class="subheader"><?= __('Year Of Birth: ') ?></h6>
                    <p><?= h($user->date_birth) ?></p><br><br>


                    <h6 class="subheader"><?= __('Contact Type: ') ?></h6><br>
                    <p><?= h($user->contact_type->contact_types_name) ?></p><br>
    </fieldset>


    <fieldset class="col2">
		<legend>Address</legend>
            <p><?= h($user->street_address) ?></p>,
            <p><?= h($user->suburb) ?></p><br>
            <p><?= h($user->state->state_name) ?></p>,
            <p><?= h($user->postcode) ?></p><br>
            <p><?= h($user->country->country_name) ?></p>

	</fieldset>


    <fieldset class="col3">
		<legend>Membership</legend>
            <h6 class="subheader"><?= __('Status: ') ?></h6>
            <p><?= h($user->mem_type_name) ?></p>


	</fieldset>



<br><br><br><br>
	<div class="">
        <div class="">
        <h4 class="subheader"><?= __('Related Organisations') ?></h4>
        <?php if (!empty($user->organisations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Org Type Id') ?></th>
                <th><?= __('Org Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->organisations as $organisations): ?>
            <tr>
                <td><?= h($organisations->id) ?></td>
                <td><?= h($organisations->user_id) ?></td>
                <td><?= h($organisations->org_type_id) ?></td>
                <td><?= h($organisations->org_name) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Organisations', 'action' => 'view', $organisations->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Organisations', 'action' => 'edit', $organisations->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organisations', 'action' => 'delete', $organisations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisations->id)]) ?>

                </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        </div>
    </div>


</div>
