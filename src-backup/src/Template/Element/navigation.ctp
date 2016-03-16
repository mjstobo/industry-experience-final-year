
<?php echo $this->Html->css('publicNav.css'); ?>
<script>
  function goBack() {
      window.history.back();
  }
</script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <div class="moduletable_leftmenu">
          <ul class="nav navbar-nav" id="noDesign">
            <?php if($this->request->session()->check('Auth.User')){ ?>
              <?php if($this->request->session()->read('Auth.User.user_type_id') == 1) { ?>
              <h5>Signed in as: Staff</h5>

              <li><?php echo $this->Html->link('Admin Panel', ['controller' => 'users', 'action' => 'index', 'prefix' => 'admin', '_full' => true]);
              } ?>
              </li>

              <?php $count = $this->request->session()->read('count') ?>


             <li><?php echo $this->Html->link('Home', ['controller' => 'users', 'action' => 'home', '_full' => true]); ?></li>
              <li><?php echo $this->Html->link('My Profile', ['controller' => 'users', 'action' => 'viewprofile', $this->request->session()->read('Auth.User.id')]); ?></li>
              <li> <?php if($this->request->session()->read('Auth.User.user_type_id') != 1){
                        echo $this->Html->link('Subscriptions', ['controller' => 'mailing', 'action' => 'index', 'prefix' => false]); } ?></li>
              <li><?php echo $this->Html->link('Library Catalogue', ['controller' => 'items', 'action' => 'search']); ?></li>

              <li><?php echo $this->Html->link('My Library Cart'.' ('.$count.')', ['controller' => 'items', 'action' => 'librarycart']);  ?></li>

              <li><?php echo $this->Html->link('My Reserves', ['controller' => 'reserves', 'action' => 'viewReserves']); ?></li>

              <li> <?php if($this->request->session()->read('Auth.User.user_type_id') != 1){
                        echo $this->Html->link('Make an Enquiry', ['controller' => 'users', 'action' => 'enquiry']); } ?></li>

              <li> </li><br>
              <li> <?php echo $this->Html->link( "Logout", ['action' => '../users/logout'] ); } ?></li>

          </ul>
        </div>
      </div>
    </div>



