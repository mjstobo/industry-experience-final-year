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
          <h3 class="navbar-brand">Members Portals</h3>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if($this->request->session()->check('Auth.User')){ ?>
              <?php if($this->request->session()->read('Auth.User.user_type_id') == 1) { ?>
              <h5> Logged in: Staff</h5>
             <li><?php echo $this->Html->link('Admin Panel', ['controller' => 'users', 'action' => 'index', 'prefix' => 'admin', '_full' => true]); } ?></li>
            <li><?php echo $this->Html->link('Edit Profile', ['controller' => 'users', 'action' => 'edit', $this->request->session()->read('Auth.User.id')]); ?>  </li>
              <li><?php echo $this->Html->link( "Logout", ['action' => '../users/logout'] ); } ?></li>



          </ul>
        </div>
      </div>
    </div>

    <br>
    <a ref onclick="goBack()">Back</a>

