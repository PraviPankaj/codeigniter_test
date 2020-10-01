<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="robots" content="noindex">
  <link rel="shortcut icon" href="<?=base_url()?>/assets/images/favicon.ico" type="image/x-icon">

  <title><?=$metadata['page_title']?></title>

    <link href="<?=base_url()?>/assets/css/style.default.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/css/custom.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">

    <script src="<?=base_url()?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery-migrate-1.2.1.min.js"></script> 
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<!-- Preloader -->
<div id="preloader">
    <div id="preloader-status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1>
            <a href="<?=base_url()?>">
                <img class="" src="<?=base_url()?>assets/images/Logo_3.jpg" alt="" width="70%" height="40%"/>
            </a>
        </h1>

    </div>
    <?php 

    $userID =  $this->session->userdata('userID');

    if($this->session->userdata('userType') == 'admin')
    {
    ?>
      <div class="leftpanelinner">
          
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li <?=($this->uri->segment(1) == 'dashboard') ? 'class="active"' : ''?>><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li <?=($this->uri->segment(1) == 'users') ? 'class="active"' : ''?>><a href="<?=base_url()?>users"><i class="fa fa-users"></i> <span>User List</span></a></li>

        </ul>
      </div>
    <?php 
    }
    else if($this->session->userdata('userType') == 'user')
    {
    ?>
      <div class="leftpanelinner">
          
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li <?=($this->uri->segment(1) == 'dashboard') ? 'class="active"' : ''?>><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li <?=($this->uri->segment(1) == 'users') ? 'class="active"' : ''?>><a href="<?=base_url()?>users/profile_edit"><i class="fa fa-edit"></i> <span>Profile Edit</span></a></li>

        </ul>
      </div>
    <?php 
    }
    ?>
  </div>
  
  <div class="mainpanel">
    
    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      <div class="header-right">
        <ul class="headermenu">
          
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?=$this->session->userdata('userName')?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                
                <li><a href="<?=base_url()?>login/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    