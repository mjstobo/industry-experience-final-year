<html>
<?php
if($user->user_type_id == 1)
{

}
elseif($user->user_type_id == 2)
{ ?>
<body onLoad="popup('../../settlements/viewPdf/<?= h($user->settlements[0]->id)?>', 'ad')">
<?php
}
?>



<h1>Summary</h1>
<b>Name: </b><?= h($user->given_name) ?> <?= h($user->family_name) ?><br>
<b>Address: </b><?= h($user->street_address) ?>, <?= h($user->suburb) ?><br>
<b>State: </b><?= h($user->state->state_name) ?> <?= h($user->postcode) ?><br>
<b>Country: </b><?= h($user->country->country_name) ?>
<br><br>


<?php
if($user->user_type_id == 1)
{

}
elseif($user->user_type_id == 2)
{ ?>

<b>Membership: </b><?= h($user->memberships[0]->mem_type->mem_name) ?><br>
<b>Amount: $</b><?= h($user->memberships[0]->mem_type->mem_price) ?><br>
<b>Payment: </b><?= h($paymentType) ?>

<br><br>
<?= $this->Html->link(__('<i class="fa fa-download"></i> Invoice'), ['controller'=>'Settlements','action' => 'viewPdf', $user->settlements[0]->id],['class'=>'btn btn-primary','escapeTitle'=>false, 'target'=>'_blank']) ?>


<?php
}
?>








</body>
</html>


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