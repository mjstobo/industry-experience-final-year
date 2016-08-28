<html>

<body>

The user: <?php echo $fname . ' ' . $lname; ?>,

has loaned the following items:<br>

<?php foreach ($cart as $cart_item): ?>

<b><p style="text-indent: 3em"><?php echo $cart_item->item_copy->item->title; ?><br></p></b>

<?php endforeach; ?>
<br>
These must be returned on or before <?php echo $return; ?><br><br>

These will need to be posted to: <br><br>
<?php echo $user_address; ?>


</body>
</html>