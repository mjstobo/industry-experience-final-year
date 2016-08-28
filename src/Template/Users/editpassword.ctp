<link type="text/css" href="../../webroot/css/edit.css" rel="stylesheet" media="all" />

<div class="users form large-10 medium-9 columns">
<h3><?php echo ('Edit Profile'); ?> </h3>

    <?= $this->Form->create($user, ['class'=>'edit','novalidate' => true]); ?>

    <fieldset class="col4">
        <legend>Change Password</legend>
            <span class="password"><?php   echo "<p>"; echo $this->Form->input('current_password',['label' => 'Current Password *','type'=>'password']); echo "</p>";  ?><br>
            <span class="password"><?php   echo "<p>"; echo $this->Form->input('password',['label' => 'Password *','value' => '']); echo "</p>";  ?>
            <span class="confirm"><?php   echo $this->Form->input('confirm_password',['label' => 'Confirm Password*', 'type'=>'password']); ?>
   </fieldset>



    <div><button class="button">Save &raquo;</button></div>
    <?= $this->Form->end() ?>

</div>