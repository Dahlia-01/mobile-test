<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Patient Login | Komplete Care</title>
  <!-- Favicon-->
  <link rel="icon" href="public/img/logo1.png" type="image/x-icon">

  <!-- Bootstrap Core Css -->
  <link href="public/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="public/admin/plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="public/admin/plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="public/admin/css/style.css" rel="stylesheet">
  <style type="text/css">
    /* fallback */
    @font-face {
      font-family: 'Material Icons';
      font-style: normal;
      font-weight: 400;
      src: local('Material Icons'), local('MaterialIcons-Regular'), url(public/fonts/fonts.woff2) format('woff2');
    }

    .material-icons {
      font-family: 'Material Icons';
      font-weight: normal;
      font-style: normal;
      font-size: 24px;
      line-height: 1;
      letter-spacing: normal;
      text-transform: none;
      display: inline-block;
      white-space: nowrap;
      word-wrap: normal;
      direction: ltr;
      -moz-font-feature-settings: 'liga';
      -moz-osx-font-smoothing: grayscale;
    }
  </style>
</head>

<body class="login-page">
  <div class="login-box">
    <div class="logo">
      <a href="javascript:void(0);">Patient<b> Login</b></a>
      <small><img src="public/img/logo1.png" height="45px" width="200px"></small>
    </div>
    <div class="card">
      <div class="body">
        <form id="sign_in" action="patient_login/login" method="POST">
          <div class="msg" style="color: red;"><strong>Username/ Password combination is incorrect! <br>Please ensure you have validated your account from your email address.</strong></div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">person</i>
            </span>
            <div class="form-line">
              <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
          </div>
          <input class="btn btn-block bg-red waves-effect" type="submit" name="submit" value="SIGN IN">

          <div class="m-t-25 m-b--5 align-center">
            <a href="<?php echo URL?>patient_registration" style="color: red">Dont have an account?
              Register</a><br>
              <a href="<?php echo URL?>index">Back To Home</a>
            </div>
          </form>
          <a style="color: red !important;" class="pull-right" href="<?php echo URL?>hadmin_login">Hospital Admin</a><br>
          <a style="color: red !important;" class="pull-right" href="<?php echo URL?>doctor_login">Doctors</a>
        </div>
      </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="public/admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="public/admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="public/admin/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="public/admin/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="public/admin/js/admin.js"></script>
    <script src="public/admin/js/pages/examples/sign-in.js"></script>
  </body>

  </html>