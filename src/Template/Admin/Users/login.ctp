<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login</title>
    <link rel="stylesheet" href="../../webroot/css/style.css">

</head>

<body>
<div class="login">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <h1>Admin Login</h1>
    <fieldset>
        <p><div class="input text"><label for="email-address">Email Address</label><br><input type="text" name="email_address" id="email-address" value=""></div></p>
        <p><div class="input password"><label for="password">Password</label><br><input type="password" name="password" id="password" value=""></div></p>
        <p class="remember_me">
            <label>
                <input type="checkbox" name="remember_me" id="remember_me">
                Remember me on this computer
            </label>
        </p>
        <p class="submit"><?= $this->Form->button(__('Login')); ?> </p>
    </fieldset>
</div>

<div class="login-help">
    <p>Forgot your password? <a href="">Click here to reset it</a>.</p>
    <p>Add a new user  <a href="add"> HERE</a>.</p>
</div>



</body>

</html>    