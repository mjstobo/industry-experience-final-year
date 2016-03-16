<html>
<?php echo $this->Html->css('viewUserAdmin.css');?>
<body onLoad="popup('../../settlements/viewPdf/<?= h($lastPay)?>', 'ad')">


<h1>Renew Successful</h1>
<b>Member ID: </b><?= h($user->id)?></br>
<b>Name: </b><?= h($user->given_name)?> <?= h($user->family_name)?><br><br>

<?php

?>

<b>Membership Type: </b><?= h($membership->mem_type->mem_name)?></br>
<b>Amount: </b>$<?= h($membership->mem_type->mem_price)?></br>

<br><br>
<?= $this->Html->link(__('<i class="fa fa-download"></i> Receipt'), ['controller'=>'Settlements','action' => 'viewPdf', $lastPay],['class'=>'btn btn-primary','escapeTitle'=>false, 'target'=>'_blank']) ?><br>
<span class="editButton3"><?= $this->Html->link('<i class="fa fa-user"></i> User Profile', ['controller'=>'users', 'action' => 'view', $user->id],['escapeTitle' => false]) ?></span>

</html>
</body>


<script>
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=600,height=500,scrollbars=yes');
return false;
}
</script>