<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>AZ PORTFOLIO</title>

  
  <!-- loader-->
  <link href="<?php echo base_url('assets/admin/css/pace.min.css'); ?>" rel="stylesheet"/>
  <script src="<?php echo base_url('assets/admin/js/pace.min.js'); ?>"></script>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url('assets/admin/images/favicon.ico'); ?>" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="<?php echo base_url('assets/admin/plugins/simplebar/css/simplebar.css'); ?>" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?php echo base_url('assets/admin/css/animate.css'); ?>" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo base_url('assets/admin/css/icons.css'); ?>" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="<?php echo base_url('assets/admin/css/sidebar-menu.css'); ?>" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="<?php echo base_url('assets/admin/css/app-style.css'); ?>" rel="stylesheet"/>
  
  

  
</head>


<body class="bg-theme ">

<!-- alfaiz -->

<!-- start loader -->
   <div id="ftco-loader" class="show fullscreen">
    <div class="loader-container">
        <div class="loader-icon"></div>
        <div class="loader-text"></div>
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" />
        </svg>
    </div>
</div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="<?php echo base_url() ?>" target="_blank">
       <img src="<?php echo base_url('assets/admin/images/logo-icon.png') ?>" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">AZ Admin Dashboard</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="<?php echo base_url('admin'); ?>">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('admin/slider'); ?>">
          <i class="zmdi zmdi-invert-colors"></i> <span>Slider</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('admin/about'); ?>">
        <i class="zmdi zmdi-account-add"></i> <span>About</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('admin/resume'); ?>">
          <i class="zmdi zmdi-grid"></i> <span>Resume</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('admin/service'); ?>">
          <i class="zmdi zmdi-calendar-check"></i> <span>Service</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('admin/skill'); ?>">
          <i class="zmdi zmdi-face"></i> <span>Skill</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('admin/sskill'); ?>" >
          <i class="zmdi zmdi-lock"></i> <span>Skill</span>
          <small class="badge float-right badge-light">Skill Secound Section</small>

        </a>
      </li>

       <li>
        <a href="<?php echo base_url('admin/contact'); ?>">
          <i class="zmdi zmdi-account-circle"></i> <span>Contact</span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('admin/site-settings'); ?>">
          <i class="zmdi zmdi-account-circle"></i> <span>Basic Information</span>
        </a>
      </li>
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <!-- <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li> -->
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">


    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://cdn.pixabay.com/photo/2016/11/18/15/03/man-1835195_960_720.jpg" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://cdn.pixabay.com/photo/2016/11/18/15/03/man-1835195_960_720.jpg" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $this->session->userdata('user');?></h6>
            <p class="user-subtitle"><?php echo $this->session->userdata('email') ;?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <!-- <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li> -->
        <li class="dropdown-divider"></li>
        <li class="dropdown-item">
    <a href="<?php echo base_url('admin/logout'); ?>">
        <i class="icon-power mr-2"></i> Logout
    </a>
</li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->
<div class="clearfix"></div>
