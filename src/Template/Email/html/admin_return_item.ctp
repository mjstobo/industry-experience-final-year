<html>

<body>

The user: <?php echo $fname . ' ' . $lname; ?>,

has reserved the following items:<br>

<?php foreach ($cart as $cart_item): ?>

<b><p style="text-indent: 3em"><?php echo $cart_item->item_copy->item->title; ?><br></p></b>

<?php endforeach; ?>

This will expire on <?php echo $return; ?>
<br>



</body>
</html>