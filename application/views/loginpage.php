<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MKM | Log inn</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>themes/bootstrap-yeti.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background:#f6fcfe" class="hold-transition login-page">
  <div class="login-box" style="margin-bottom : 200px;width: 400px">
    <div class="login-logo" style="text-align: left;">
      <b style="color:#4FD249;font-size: 24px;"><img align="center" src="<?= base_url('images/') ?>logoMKM2.jpg" width="100" height="40">&nbsp;</b><span style="font-size: 20px">Sys. Integration</span>
    </div>
    <!-- /.login-logo -->
    <div class="">
      <div class="card-body " style="background:#E0F8E3 ;border: 3px solid #74D396;border-radius:10px;box-shadow:0px;">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->
        <h2 style="float: center;padding: 10px;"><i class="fa fa-user"></i> Login</h2>
        <h5 style="font-size: 14;"><?= $this->session->flashdata('message') ?></h5>


        <form action="<?= site_url('login') ?>" method="POST">
          <div class="input-group mb-2">
            <input type="text" class="form-control" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Please enter username  !!')">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user" style="text-align: left"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-2">
            <input type="password" class="form-control" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Please enter password  !!')">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <!--  <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div> -->
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button style="margin-top: 10px;" type="submit" class="btn btn-success btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
        <!-- /.social-auth-links -->

        <!--  <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

</body>

</html>