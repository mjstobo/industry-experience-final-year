<?php echo $this->Html->css('loginStyle.css'); ?>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
<div class="center">
    <div class="login">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
      <h1>Login</h1>
        <fieldset>
        <p><div class="input text"><input type="text" name="email_address" id="email-address" value="" placeholder='&#xf0e0; Email Address'></div></p>
        <p><div class="input password"><input type="password" name="password" id="password" value="" placeholder='&#xf023; Password'></div></p>
        <div class="input"><button class="loginButton">Log In</button></div>
        <br><br>
        <h6><center>- Not a Member? Register Now -</h6></center>
        <div class="registerButton"><h4><?php echo $this->Html->link('Register', ['controller' => 'users', 'action' => 'add'],['class'=>'text']); ?><h4></div>
        </fieldset>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="forget">Click here to reset it</a>.</p>
    </div>
</div>


</body>

</html>