<h1>Successfully Unsubscribed!</h1>

<?php
   echo $this->Html->link('Back to User Subscription',
    ['controller' => 'mailing', 'action' => 'view',
    $user->id]
    ); ?>
<br>
<?php
    echo $this->Html->link(
    'Back to Mailing List Management',
    ['controller' => 'mailing', 'action' => 'index', '_full' => true]);