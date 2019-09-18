
<!DOCTYPE html>
<html lang="en">
  

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- vendor css -->
    <link href="lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="assets/css/dashforge.css">
    <link rel="stylesheet" href="assets/css/dashforge.dashboard.css">
<link rel="stylesheet" href="assets/css/dashforge.demo.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">-->


<style>
.show{
display:block;
}
.hide{
display:none;
}
.dataTables_wrapper{
width:100%;
}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;

  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 13px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
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
        <a href="dashboard.php" class="df-logo">Indian<span>SmartHub</span></a>
      </div><!-- navbar-brand -->
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="dashboard.php" class="df-logo">Indian<span>SmartHub</span></a>
          <a id="mainMenuClose" href="#"><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
        <ul class="nav navbar-menu">
		
          <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>

		<li class="nav-item"><a href="dashboard.php" class="nav-link"><i data-feather="box"></i>Dashboard</a></li>
		<li class="nav-item"><a href="adminUser.php" class="nav-link"><i data-feather="box"></i>Users</a></li>
		<li class="nav-item"><a href="orgChart.php" class="nav-link"><i data-feather="box"></i>Reporting Structure</a></li>
		<li class="nav-item"><a href="adminCustomer.php" class="nav-link"><i data-feather="box"></i>Customers</a></li>
		<li class="nav-item"><a href="masterData.php" class="nav-link"><i data-feather="box"></i>Master Data</a></li>
		<li class="nav-item"><a href="adminForms.php" class="nav-link"><i data-feather="box"></i>Forms</a></li>
		<li class="nav-item"><a href="adminReports.php" class="nav-link"><i data-feather="box"></i>Reports</a></li>
     
        </ul>
      </div><!-- navbar-menu-wrapper -->
      <div class="navbar-right">
        <a id="navbarSearch" href="#" class="search-link"><i data-feather="search"></i></a>
        
        
        <div class="dropdown dropdown-profile">
          <a href="#" class="dropdown-link" data-toggle="dropdown" data-display="static">
            <div class="avatar avatar-sm"><img src="assets/img/img1.png" class="rounded-circle" alt=""></div>
          </a><!-- dropdown-link -->
          <div class="dropdown-menu dropdown-menu-right tx-13">
            <div class="avatar avatar-lg mg-b-15"><img src="assets/img/img1.png" class="rounded-circle" alt=""></div>
            <h6 class="tx-semibold mg-b-5">Katherine Pechon</h6>
            <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>

            <a href="#" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
            <a href="page-profile-view.html" class="dropdown-item"><i data-feather="user"></i> View Profile</a>
            <div class="dropdown-divider"></div>
            <a href="page-help-center.html" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a>
            <a href="#" class="dropdown-item"><i data-feather="life-buoy"></i> Forum</a>
            <a href="#" class="dropdown-item"><i data-feather="settings"></i>Account Settings</a>
            <a href="#" class="dropdown-item"><i data-feather="settings"></i>Privacy Settings</a>
            <a href="page-signin.html" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- navbar-right -->
      <div class="navbar-search">
        <div class="navbar-search-header">
          <input type="search" class="form-control" placeholder="Type and hit enter to search...">
          <button class="btn"><i data-feather="search"></i></button>
          <a id="navbarSearchClose" href="#" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
        </div><!-- navbar-search-header -->
        <div class="navbar-search-body">
          <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Recent Searches</label>
          <ul class="list-unstyled">
            <li><a href="dashboard-one.html">modern dashboard</a></li>
            <li><a href="app-calendar.html">calendar app</a></li>
            <li><a href="http://themepixels.me/dashforge/collections/modal.html">modal examples</a></li>
            <li><a href="http://themepixels.me/dashforge/components/el-avatar.html">avatar</a></li>
          </ul>

          <hr class="mg-y-30 bd-0">

          <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Search Suggestions</label>

          <ul class="list-unstyled">
            <li><a href="dashboard-one.html">cryptocurrency</a></li>
            <li><a href="app-calendar.html">button groups</a></li>
            <li><a href="http://themepixels.me/dashforge/collections/modal.html">form elements</a></li>
            <li><a href="http://themepixels.me/dashforge/components/el-avatar.html">contact app</a></li>
          </ul>
        </div><!-- navbar-search-body -->
      </div><!-- navbar-search -->
    </header><!-- navbar -->
    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">


        <div class="row row-xs" style="padding-bottom:30px;">
		
		<div class="col-md-6 offset-md-3">
		<div class="card">
		<div class="card-body">
		<form action="<?=base_url('Sales_tracker/masterDataImportExpenseCategory')?>" method="post" enctype="multipart/form-data">
		<input type="file" name="data_import" class="form-control"/><br>
		<input type="submit" value="submit" name="submit" value="1" class="btn btn-info"/>
		</form>

		<br><br>
		<p class="text-center"><a href="<?=base_url()?>excel/expensecsv.csv" download>Click here to download sample file </a></p>

		</div>
		</div>
		</div>

      </div><!-- container -->





	 


    </div><!-- content -->

  <!-- content-footer -->
    <script src="<?=base_url()?>lib/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>lib/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?=base_url()?>lib/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.js"></script>
    <script src="vassets/js/dashforge.sampledata.js"></script>
    <!-- append theme customizer -->
    <script src="<?=base_url()?>lib/js-cookie/js.cookie.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.settings.js"></script>





  </body>

</html>
