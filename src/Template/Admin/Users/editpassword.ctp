<?php echo $this->Html->script('tabs');?>
<?php echo $this->Html->css('formAdminEditUser');?>
<div class="users form large-10 medium-9 columns">

   <?= $this->Form->create($user, ['class'=>'edit','novalidate' => true]); ?>
   <span class="floatRight"> ID: #<?= h($user->id) ?></span>
   <h1>Edit Member Password</h1>

   <div style="width: auto; margin: 0 auto;">
       <div class="tabcontents">
           <div id="view1">
               <legend>Change Password</legend>
               <?php  echo "<p>";echo $this->Form->input('password',['label'=>'Password', 'placeholder'=>'Password', 'value' => '']);echo "</p>";   ?>
               <?php  echo $this->Form->input('confirm_password',['label' => 'Retype Password', 'type'=>'password', 'placeholder'=>'Retype password']);    ?> <br><br>


           </div>
       </div>
       <button class="button">Save &raquo;</button>
       <?= $this->Form->end() ?>
   </div>


    <br><br>

    <div class="tabcontents">
        <legend>Generate New Password</legend>
          Note: A new password will be generated automatically and sent to the member's email address.<br>

    </div>
    <?= $this->html->link('Generate Password', ['action' => 'generatepassword', $user->id], ['confirm' => 'Are you sure you want to generate a new password?','class'=>'button']) ?>

</div>
<br><br>