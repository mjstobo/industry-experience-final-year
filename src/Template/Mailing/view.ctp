<?php echo $this->Html->css('viewUserAdmin.css');?>

<br><h1>Mailing subscriptions for <?php echo h($user->given_name)." ".h($user->family_name) ?></h1><font size="-1">Acc. Status: </font><b><em><?= h($user->memberships[0]->status->status_name) ?></em></b><br>

<div><br>
<b>Email Address:</b> <?= h($user->email_address) ?> <br><br>

<h4> EDV Mailing List </h4>
Status: <?php echo $firstList; ?> <br>
<?php if($firstBool){
       echo $this->Html->link(
       'Unsubscribe',
       ['controller' => 'mailing', 'action' => 'unsubscribe', 'listid' => 'firstlist', '_full' => true, $user->id]);
       } else if(!$firstBool){
       echo $this->Html->link(
       'Subscribe',
       ['controller' => 'mailing', 'action' => 'subscribe','listid' => 'firstlist', '_full' => true, $user->id]);} ?>

<br>
</div>
