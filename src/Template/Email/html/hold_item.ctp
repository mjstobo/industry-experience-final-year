<html>

<body>

Dear <?php echo $fname . ' ' . $lname; ?>,<br><br>

The following items have been placed on hold:<br>


<?php foreach ($cart as $cart_item): ?>

<b><p style="text-indent: 3em"><?php echo $cart_item->item_copy->item->title; ?><br></p></b>

<?php endforeach; ?>
<br>
These must be borrowed on or before <?php echo $return; ?>, or the reserve will lapse.<br><br>

Regards<br>
EDV

</body>
</html>