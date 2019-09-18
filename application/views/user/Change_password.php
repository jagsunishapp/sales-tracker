
    <div class="content content-fixed" style="height:80vh;">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
 

        <div class="row row-xs">
          <div class="col-sm-6 col-lg-6 offset-lg-3">
            <div class="card card-body">
			<span style="color:green;font-size: 15px;font-weight: bold;"><?=$this->session->flashdata('Success_us_pass')?></span>
			<span style="color:red;font-size: 15px;font-weight: bold;"><?=$this->session->flashdata('Error_us_pass')?></span>
				<form method="post" action="<?=base_url()?>sales_tracker/Change_password">
				  <div class="form-group">
					<label for="old_pass">Old Password:</label>
					<input type="password" class="form-control" name="old_pass" id="old_pass">
					<span style="color:red;"><?=form_error('old_pass')?>
					<?=$this->session->flashdata('Pass_err')?>
					</span>
				  </div>
				  <div class="form-group">
					<label for="new_pass">New Password:</label>
					<input type="password" class="form-control" name="new_pass" id="new_pass">
					<span style="color:red;"><?=form_error('new_pass')?></span>
				  </div>
				  <div class="form-group">
					<label for="confirm_pass">Confirm Password:</label>
					<input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
					<span style="color:red;"><?=form_error('confirm_pass')?>
					<?=$this->session->flashdata('Confirm_us_Pass_err')?>
					</span>
				  </div>
			
				  <button type="submit" class="btn btn-info" name="submit" value="submit">Submit</button>
				</form>
            </div>
          </div><!-- col -->
       
        
       
       

   
         
         
       
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content -->