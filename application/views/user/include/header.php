<?php
foreach ($details as $rows) {
}
foreach($profile as $row)
  {
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="<?=base_url()?>user/lib/fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="<?=base_url()?>user/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="<?=base_url()?>user/lib/jqvmap/jqvmap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>user/assets/css/dashforge.css">
<link rel="stylesheet" href="<?=base_url()?>user/assets/css/dashforge.dashboard.css">
<link rel="stylesheet" href="<?=base_url()?>user/assets/css/dashforge.demo.css">
<link rel="stylesheet" href="<?=base_url()?>user/assets/css/dashforge.chat.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">-->


<style>
  .bbc{
    background-color: #00b8d4;
    color:white;
    padding: 10px 0px;
  }
.show{
display:block;
}
.hide{
display:none;
}
.dataTables_wrapper{
width:100%;
}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}
.tab button {
  background-color: inherit;
  float: left;

  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 13px;
}
.tab button:hover {
  background-color: #ddd;
}
.tab button.active {
  background-color: #ccc;
}
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>


  </head>
  <body class="page-profile">

    <header class="navbar navbar-header navbar-header-fixed">
      <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
      <div class="navbar-brand">
        <a href="<?=base_url('user_view/dashboard')?>" class="df-logo">Indian<span>SmartHub</span></a>
      </div>
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="<?=base_url('user_view/dashboard')?>" class="df-logo">Indian<span>SmartHub</span></a>
          <a id="mainMenuClose" href="#"><i data-feather="x"></i></a>
        </div>
        <ul class="nav navbar-menu">
          <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
      
           <li class="nav-item"><a href="<?=base_url('user_view/dashboard')?>" class="nav-link"><i data-feather="box"></i>Dashboard</a></li>
           
           <li class="nav-item"><a href="<?=base_url('user_view/my-team')?>" class="nav-link"><i data-feather="box"></i>My Team</a></li>
           
           <li class="nav-item"><a href="<?=base_url('user_view/expenses')?>" class="nav-link"><i data-feather="box"></i>Expenses</a></li>
          
           <li class="nav-item"><a href="<?=base_url('user_view/customers')?>" class="nav-link"><i data-feather="box"></i>Customers</a></li>
           <li class="nav-item"><a href="<?=base_url('user_view/messages')?>" class="nav-link"><i data-feather="box"></i>Messages</a></li>
            <li class="nav-item"><a href="<?=base_url('user_view/forms')?>" class="nav-link"><i data-feather="box"></i>Forms</a></li>
           <li class="nav-item"><a href="<?=base_url('user_view/reports')?>" class="nav-link"><i data-feather="box"></i>Reports
		   </a></li>
	
			 <li class="nav-item"><div class="dropdown">

  <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Visits
	</a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?=base_url('user_view/single-visits')?>">Single Visits</a>
    <a class="dropdown-item" href="<?=base_url('user_view/multiple-visits')?>">Multiple Visits</a>
    
  </div>
</div></li>
		   
		   
        </ul>
      </div>
      <div class="navbar-right">
        <?php
        if($this->session->userdata('user_email'))
        {
          if($row['photo']=='')
            {
              $img = "profile.png";
              $imgs ="profile.png";
            }
            else
            {
              $img = $row['photo'];
            }
        }
        ?>
        <!-- <a id="navbarSearch" href="#" class="search-link"><i data-feather="search"></i></a> -->
        <div class="dropdown dropdown-profile">
          <a href="#" class="dropdown-link" data-toggle="dropdown" data-display="static">
            <div class="avatar avatar-sm"><img src="<?=base_url()?>img/<?=$img?>" class="rounded-circle" alt="profile"></div>
          </a>
          <div class="dropdown-menu dropdown-menu-right tx-13">
            <div class="avatar avatar-lg mg-b-15"><img src="<?=base_url()?>img/<?=$img?>" class="rounded-circle" alt=""></div>
            <h6 class="tx-semibold mg-b-5"><?php
            if($this->session->userdata('user_email'))
            {
              echo $row['first_name'];
            }
            ?></h6>
          

            <a href="<?=base_url('user_view/profile')?>" class="dropdown-item"><i data-feather="edit-3"></i> My Profile</a>
            <a href="<?=base_url('user_view/Change_password')?>" class="dropdown-item"><i data-feather="user"></i> Change password</a>
          
       
            <!-- <a href="<?=base_url('sales_tracker/admin_Account_Settings')?>" class="dropdown-item"><i data-feather="settings"></i>Admin Panel</a> -->
          
            <a href="<?=base_url('sales_tracker/logout')?>" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
          </div>
        </div>
      </div>
      <div class="navbar-search">
        <div class="navbar-search-header">
          <input type="search" class="form-control" placeholder="Type and hit enter to search...">
          <button class="btn"><i data-feather="search"></i></button>
          <a id="navbarSearchClose" href="#" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
        </div>
      </div>
    </header>