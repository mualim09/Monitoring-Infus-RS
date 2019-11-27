<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Monitoring Infus</title>
  <link rel="shortcut icon" href="img/icon.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/cms/') ?>css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/cms/') ?>css/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/cms/') ?>css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/cms/') ?>css/skins-teacher.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/cms/') ?>css/dataTables.bootstrap.min.css">
  <style>
    @media print {
      .aksi {
        display: none;
      }
    }
  </style>

  <script src="<?php echo base_url('assets/cms/') ?>js/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url('assets/cms/') ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/cms/') ?>js/app.js"></script>
<!--   <script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script> -->

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>INF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Monitoring</b> Infus</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
     
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
       <!--    <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets') ?>/img/not-profile-admin.png" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu"> -->
              <!-- User image -->
            <!--   <li class="user-header">
                <img src="<?php echo base_url('assets') ?>/img/not-profile-admin.png" class="img-circle" alt="User Image">

                <p>
                  
                  <small></small>
                </p>
              </li> -->
              <!-- Menu Body -->
              <!-- Menu Footer-->
            <!--   <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li> -->
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel"> -->
      <!--   <div class="pull-left image">
          <img src="<?php echo base_url('assets') ?>/img/not-profile-admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
      <!-- </div> -->
  
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment('2')==''){echo 'active';} ?> treeview">
          <a href="<?php echo base_url('web') ?>">
            <i class="fa fa-dashboard"></i> <span>Monitoring</span>
            
          </a>
        </li>
        <li class="<?php if($this->uri->segment('2')=='pasien'){echo 'active';} ?> treeview">
          <a href="<?php echo base_url("web/pasien") ?>">
            <i class="fa fa-bed"></i>
            <span>Pasien </span>
          </a>
        </li>
          <li class="<?php if($this->uri->segment('2')=='perangkat'){echo 'active';} ?> treeview">
          <a href="<?php echo base_url("web/perangkat") ?>">
            <i class="fa fa-hdd-o"></i>
            <span>Perangkat</span>
          </a>
        </li>
          <li class="<?php if($this->uri->segment('2')=='infus'){echo 'active';} ?> treeview">
          <a href="<?php echo base_url("web/infus") ?>">
            <i class="fa fa-thermometer-half "></i>
            <span>Infus</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
