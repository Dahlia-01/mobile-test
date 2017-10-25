<?php 
if(!isset($_GET['url'])){
    $_GET['url']='index';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>KompleteCare | Admin </title>
    <!-- Favicon-->
  <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="public/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="public/admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="public/admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="public/admin/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="public/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="public/admin/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="public/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="public/admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="public/admin/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="public/admin/css/style.css" rel="stylesheet">
    <link href="public/fonts/font-awesome.min.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="public/admin/css/themes/all-themes.css" rel="stylesheet" />
    <style>
     @font-face {
          font-family: 'Raleway';
          src: url('public/fonts/Raleway-Medium.ttf') format('truetype');
      }
      @font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(public/fonts/fonts.woff2) format('woff2');
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

<body class="theme-red" style="font-family: Raleway !important;">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo URL?>index"><span style="background-color: #fff; padding: 5px; border-radius: 20px; font-variant: small-caps;"><font color="#3F51B5">&nbsp;&nbsp;KC</font><font color="#F44336">Mobile&nbsp;&nbsp;</font></span></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                            <li><a>Welcome <?php echo $username; ?></a></li>
                            <li><a href="tel:555-555-5555" type="submit" value="Submit"><font size="+1"><i class = "fa fa-phone"></i></font></a></li>
                            <li><a href="https://www.appear.in/dahlia01" value="Submit"><font size="+1"><i class = "fa fa-video-camera"></i></font></a></li>
                            <li><a href="<?php echo URL?>views/logout.php"><i class="material-icons">input</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="public/img/patients/<?php echo $pix; ?>" width="48" height="48" alt="User" />
<form enctype="multipart/form-data" method="POST" action="index/changePhoto" class="pull-right">
              <input type="hidden" name="patient_id" value="<?php echo $patient_id ?>">
                <input type="file" name="photo"><input type="submit" name="submit" value="CHANGE" class="btn btn-danger">
              </form>
                </div>
                <div class="info-container">

                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                   <li class="<?php if($_GET['url']=='index' || $_GET['url']=='landing_page'){echo'active';} ?>"><a href="<?php echo URL?>index"><i class="material-icons">grain</i> <span>Dashboard</span></a> </li>
    <li class="<?php if($_GET['url']=='patient_appointment' || $_GET['url']=='patient_consultation'){echo'active';} ?>"> <a href="<?php echo URL?>patient_appointment"><i class="material-icons">date_range</i> <span>Appointments</span></a> </li>
<!--     <li class="<?php if($_GET['url']=='admin_consultations'){echo'active';} ?>"> <a href="<?php echo URL?>admin_consultations"><i class="icon icon-inbox"></i> <span>Consultations</span></a> </li> -->
    <li class="<?php if($_GET['url']=='patient_mailbox' || $_GET['url']=='patient_readmail'){echo'active';} ?>"><a href="<?php echo URL?>patient_mailbox"><i class="icon material-icons">mail_outline</i> <span>Messages</span>&nbsp;<span class="badge"><?php echo $unread; ?></span></a></li>
       <li class="<?php if($_GET['url']=='patient_hospital_cards' || $_GET['url']=='card_details'){echo'active';} ?>"><a href="<?php echo URL?>patient_hospital_cards"><i class="material-icons">folder_shared</i> <span>Hospital Cards</span></a></li>
  
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date("Y"); ?> <a href="javascript:void(0);">KompleteCare™</a> 
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
      
    </section>