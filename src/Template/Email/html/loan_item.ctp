<html>

<body>

Dear <?php echo $fname . ' ' . $lname; ?>,<br><br>

You have loaned the following items:<br>


<?php foreach ($cart as $cart_item): ?>

<b><p style="text-indent: 3em"><?php echo $cart_item->item_copy->item->title; ?><br></p></b>

<?php endforeach; ?>
<br>
These must be returned on or before <?php echo $return; ?><br><br>

Regards<br>
EDV

</body>
</html>