
<h3><?php echo ('Change Password'); ?> </h3>

<?php
  if (isset($_POST['submit'])) {
    $example = $_POST['email_address'];
  }
?>
<form action="forget" method="post">
  Please type in your email to reset : <input name="email_address" type="text" />
  <input name="submit" type="submit" />
</form>