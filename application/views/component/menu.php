<nav class="navbar fixed-top navbar-expand-sm navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand qr-link" data-page="home">> 
        <img src="<?= base_url() ?>assets/img/logo.png" height="30px">
    </a>
    <button class="btn btn-primary qr-link loginbtn" data-page="login" type="button">Login</button>
    <button class="btn qr-link accountbtn" data-page="profile" type="button">
      <i class="fa fa-user"></i>&nbsp; <span class="text-capitalize" id="userName"></span>
    </button>
  </div>
</nav>