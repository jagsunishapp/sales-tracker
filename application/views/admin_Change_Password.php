    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">


        <div class="row row-xs" style="padding-bottom:30px;">
		
		<div class="col-md-8 offset-md-2">
		<div class="card">
		<div class="card-body">
    <span style="color:green;font-size: 15px;font-weight: bold;"><?=$this->session->flashdata('Success_pass')?></span>
    <span style="color:red;font-size: 15px;font-weight: bold;"><?=$this->session->flashdata('Error_pass')?></span>
		<form method="post">
		 <table class="table">
 
    <tbody>
      <tr>
        <td>Old Password</td>
        <td><input type="password" name="old_pass" class="form-control"/>
          <span style="color:red;"><?=form_error('old_pass')?>
            <?=$this->session->flashdata('Pass_err')?>
          </span></td>        
      </tr>
	    <tr>
        <td>New Password</td>
        <td><input type="password" name="new_pass" class="form-control"/>
        <span style="color:red;"><?=form_error('new_pass')?></span></td>        
      </tr>
	  
	    <tr>
        <td>Confirm Password</td>
        <td><input type="password" name="confirm_pass" class="form-control"/>
        <span style="color:red;"><?=form_error('confirm_pass')?>
          <?=$this->session->flashdata('Confirm_Pass_err')?>
        </span></td>        
      </tr>

      <tr>
      <td colspan="2"><button type="submit" class="btn btn-info" name="save" value="1">Save</button>
      <button class="btn ">Cancel</button>
      </td> 
      </tr>

    </tbody>
  </table>
  </form>


		</div>
		</div>
		</div>

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

    <script src="<?=base_url()?>assets/js/dashforge.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="<?=base_url()?>lib/js-cookie/js.cookie.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.settings.js"></script>
  </body>
</html>