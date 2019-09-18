<?php
$i=1;
foreach($profile as $row)
  {
  }
?>
    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">


        <div class="row row-xs" style="padding-bottom:30px;">
		
		<div class="col-md-8 offset-md-2">
		<div class="card">
		<div class="card-body">
      <?php
      if($this->session->flashdata('Success'))
      {
        echo '<center><span style="color:#0d980d;font-weight:bold;font-size:15px;">'.$this->session->flashdata('Success').'</span></center>';
      }
      elseif($this->session->flashdata('Errors'))
      {
        echo '<center><span style="color:#0d980d;font-weight:bold;font-size:15px;">'.$this->session->flashdata('Errors').'</span></center>';
      }

     if($this->session->userdata('email'))
        {
          if($row['photo']=='')
            {
              $img = "";
              $imgs ="profile.png";
            }
            else
            {
              $img = $row['photo'];
              $imgs =$row['photo'];
            }
        }
      ?>
		<form method="post" enctype="multipart/form-data" action="<?=base_url()?>sales_tracker/adminProfile">
		 <table class="table">
 
    <tbody>
      <tr>
        <td>First Name</td>
        <td><input type="text" class="form-control" name="fname" value="<?=$row['first_name']?>"/>
          <span style="color:red;"><?=form_error('fname')?></span>
        </td>
      </tr>
	    <tr>
        <td>Last Name</td>
        <td><input type="text" class="form-control" name="lname" value="<?=$row['last_name']?>"/>
          <span style="color:red;"><?=form_error('lname')?></span>
        </td>    
      </tr>
	  
	    <tr>
        <td>Designation</td>
        <td><input type="text" class="form-control" name="desig" value="<?=$row['designation']?>"/>
          <span style="color:red;"><?=form_error('desig')?></span>   
        </td> 
           
      </tr>
    
	 <tr>
        <td>Photo Upload</td>
        <td>
        <img src="<?=base_url()?>img/<?=$imgs?>" style="height:80px;"/>
        <input type="file" class="form-control" name="file" value="<?=$img?>"/>
        <input type="hidden" name="oldfile" value="<?=$img?>">
        <span style="color:red"><?php echo $this->session->flashdata('error');?></span> 
      </td>      
      </tr>
	  
	   <tr>
        <td>Gender</td>
        <td>
		<label class="radio-inline"><input type="radio" name="gender" value="1" <?php if($row['gender']==1){ echo "checked";}?>>  Male</label>
		<label class="radio-inline"><input type="radio" name="gender" value="2" <?php if($row['gender']==2){ echo "checked";}?>> Female</label>
    <span style="color:red;"><?=form_error('gender')?></span> 
		</td>             
      </tr>
	  
	     <tr>
        <td>Email</td>
        <td><input type="text" class="form-control" name="email" value="<?=$row['email']?>"/>
          <span style="color:red;"><?=form_error('email')?></span>   
        </td>       
      </tr>
	  
	     <tr>
        <td>Mobile No.</td>
        <td><input type="text" class="form-control" name="mob" value="<?=$row['mobile_no']?>"/>
          <span style="color:red;"><?=form_error('mob')?></span>
        </td>         
      </tr>
	  
	       <tr>
        <td colspan="2"><button type="submit" class="btn btn-info" name="save" value="1">Save</button>
		<!-- <button class="btn">Cancel</button> -->
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