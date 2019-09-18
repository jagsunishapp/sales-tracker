<!DOCTYPE html>
<html lang="en">
  

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- vendor css -->
    <link href="<?=base_url()?>lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?=base_url()?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.auth.css">
  </head>
  <body style="background-image: url(<?=base_url()?>img/charts-data-desk-669615.jpg);background-size:100% 110%;">

 

    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
       
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60" style="padding: 20px;box-shadow: 2px 6px 15px 1px #00000045;background:white;padding-top:0px;">
            <div class="wd-100p" style="padding: 30px 10px;">
              <div class="text-center">
              <h1 class="tx-color-01 mg-b-5">Sign In</h1>
              <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>
            </div>

            <form method="post" action="<?=base_url()?>sales_tracker/login">
              <center><span style="color:red;font-size: 15px;font-weight: bold;"><?=$this->session->flashdata('Error');?></span></center>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="yourname@yourmail.com">
                <span style="color:red;"><?=form_error('email')?></span>
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                  
                </div>
                <input type="password" class="form-control" name="pass" placeholder="Enter your password">
                <span style="color:red;"><?=form_error('pass')?></span>
              </div>
              <button type="submit" class="btn btn-brand-02 btn-block" name="submit">Sign In</button>
             </form>
            
            </div>
          </div><!-- sign-wrapper -->

        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->




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
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.sampledata.js"></script>
    <!-- append theme customizer -->
    <script src="<?=base_url()?>lib/js-cookie/js.cookie.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.settings.js"></script>
  </body>
</html>