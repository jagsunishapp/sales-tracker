

    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="sidebar-nav">
         <li class="nav-label mg-b-15">Master</li>
  <li class="nav-item"><a href="#" id="btn1"> Purpose</a></li>
<li class="nav-item"><a href="#" id="btn2"> Expense Categories</a></li>
<li class="nav-item"><a href="#" id="btn3"> Territory Categories</a></li>
<li class="nav-item"><a href="#" id="btn4"> Industry Categories</a></li>
<!-- <li class="nav-item"><a href="#" id="btn5"> List Categories</a></li> -->
<li class="nav-item"><a href="#" id="btn6"> office Location</a></li>
</ul>
</div><!-- sidebar-body -->
</div><!-- sidebar -->
<div class="content content-components">
<div class="row tx-14" id="tab1">
<span id="msg_succ" style="color: green;"></span>
	<div class="col-md-12 text-right" style="padding-bottom:20px;">
	<a href="<?php echo base_url('Sales_tracker/view/masterDataImportPurposeCategory');?>" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Import Purpose Category</a>
	
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Purpose</button>
	</div>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr><th><b>SNo.<b></th>
                <th><b>Purpose<b></th>
                <th><b>Status<b></th> 

				<th><b>Action<b></th>
            </tr>
        </thead>
      
        <tbody>
          
          
          <?php
          $i=1;
          foreach ($purpose_data as $row) {
            ?>
            <tr>
              <td><?php echo $i++;?></td>
                <td><?php echo $row['purpose_name'];?></td>            
                <td>

                  <form action="<?php echo base_url('Sales_tracker/update_status');?>" method="post">
                 <input type="hidden" name="purpose_abc" value="<?php echo $row['purpose_id'];?>">
           
                  <?php
                if ($row['status']==1)
                 {
                 ?>
                <input type="hidden" name="status" value="0">
                <button type="submit" class="btn btn-success">Active</button>
             <?php
                }
                else
                {
                ?>
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-danger">Inactive</a>
                <?php
                }
               ?>
               </form>
             </td>
				<td>
          
          <button type="button" name="update_button" class="btn btn-info purpose" data-toggle="modal" data-target="#myModal" value="<?php echo $row['purpose_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button>
         
        <a href="<?php echo base_url('Sales_tracker/delete');?>?del=<?php echo $row['purpose_id'];?>" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></a>
        
       </td>
				</tr>
        <?php
        }
        ?>
        </tbody>
       
       
    </table>



      <!--edit Modal -->
  <div class="modal fade" id="myModal15" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



  
     
        </div><!-- row -->
		
		
		<div class="row tx-14" id="tab2">
<div class="col-md-12 text-right" style="padding-bottom:20px;">
	<a href="<?php echo base_url('Sales_tracker/view/masterDataImportExpenseCategory');?>" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>  Import Expense Category</a>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus" aria-hidden="true"></i>  Add Expense Category</button>
	</div>


			<table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>SNo.<b></th>
                <th><b>Expense Category<b></th>
                <th><b>Status<b></th>             
				        <th><b>Action<b></th>
            </tr>
        </thead>
        <tbody>
          
          <?php
          $n=1;
             foreach ($expense_data as $roww) 
             {
    
          ?>
            <tr>
              <td><?php echo $n++;?></td>
                <td><?php echo $roww['exp_category'];?></td>            
                <td>
                  <form action="<?php echo base_url('Sales_tracker/update_exp_status');?>" method="post">
                  <input type="hidden" name="expense_abc" value="<?php echo $roww['exp_id'];?>">
                  <?php
                if ($roww['status']==1)
                 {
                 ?>
                <input type="hidden" name="status" value="0">
                <button type="submit" class="btn btn-success">Active</button>
             <?php
                }
                else
                {
                ?>
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-danger">Inactive</a>
                <?php
                }
               ?>
             </form>
                </td>
				<td><button type="button" class="btn btn-info expense" data-toggle="modal" data-target="#myModal2" value="<?php echo $roww['exp_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-info exp_del"  value="<?php echo $roww['exp_id'];?>"><i class="fa fa-trash"  aria-hidden="true"></i></button>
        </td>
				</tr>
           <?php
         }
         ?>
        </tbody>
        
    </table>
</div><!-- row -->
<div class="row tx-14" id="tab3">
		<div class="col-md-12 text-right" style="padding-bottom:20px;">
	<a href="<?php echo base_url('Sales_tracker/view/masterDataImportTerritoryCategory');?>" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>  Import Territory Category</a>
	
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal3"><i class="fa fa-plus" aria-hidden="true"></i>  Add Territory Category</button>
	</div>
<table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>Category Name<b></th>
                <th><b>Status<b></th>             
				        <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
          <?php
          $n=1;
             foreach ($territory_data as $rowww) 
             {
    
          ?>
            <tr>
                <td><?php echo $rowww['territory_name'];?></td>  
                <td> 
                <form action="<?php echo base_url('Sales_tracker/update_terr_status');?>" method="post">
                <input type="hidden" name="terr_abc" value="<?php echo $rowww['territory_id'];?>"><?php
                if ($rowww['status']==1)
                {
                ?>
                <input type="hidden" name="status" value="0">
                <button type="submit" class="btn btn-success">Active</button>
             <?php
                }
                else
                {
                ?>
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-danger">Inactive</a>
                <?php
                }
               ?>
             </form>
               </td>
				<td><button type="button" class="btn btn-info trr" data-toggle="modal" data-target="#myModal3" value="<?php echo $rowww['territory_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
<button type="button" class="btn btn-info terr_del"  value="<?php echo $rowww['territory_id'];?>"><i class="fa fa-trash"  aria-hidden="true"></i></button>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div class="row tx-14" id="tab4">
<div class="col-md-12 text-right" style="padding-bottom:20px;">
	<a href="<?php echo base_url('Sales_tracker/view/masterDataImportIndustryCategory');?>" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>  Import Industry Category</a>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal4"><i class="fa fa-plus" aria-hidden="true"></i>  Add Industry Category</button>
	</div>
<table id="example3" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>Category Name<b></th>
                <th><b>Status</b></th>             
				         <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
          <?php
          foreach ($industry_data as $rowwww)
          {
          ?>
            <tr>
                <td><?php echo $rowwww['industry_name'];?></td>            
                <td><form action="<?php echo base_url('Sales_tracker/update_industry_status');?>" method="post">
                <input type="hidden" name="industry_abc" value="<?php echo $rowwww['industry_id'];?>"><?php
                if ($rowwww['status']==1)
                {
                ?>
                <input type="hidden" name="status" value="0">
                <button type="submit" class="btn btn-success">Active</button>
             <?php
                }
                else
                {
                ?>
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-danger">Inactive</a>
                <?php
                }
               ?>
             </form></td>
				<td><button type="button" class="btn btn-info industry_update" data-toggle="modal" data-target="#myModal4" value="<?php echo $rowwww['industry_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
<button type="button" class="btn btn-info delete_industry" value="<?php echo $rowwww['industry_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div class="row tx-14" id="tab5">
<div class="col-md-12 text-right" style="padding-bottom:20px;">
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="fa fa-plus" aria-hidden="true"></i>  Add Custom List</button>
	</div>
<table id="example4" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>List Name<b></th>
                <th><b>Status</b></th>             
				        <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>            
                <td><button class="btn btn-success">Active</button></td>
				<td><a href="edit_customerAdmin.php" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<a href="#" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
</tr>
</tbody>
</table>
</div>
<div class="row tx-14" id="tab6">
<div class="col-md-12 text-right" style="padding-bottom:20px;">
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal6"><i class="fa fa-plus" aria-hidden="true"></i>  Add Office Location</button>
	</div>


			<table id="example5" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th><b>Sno<b></th>
                <th><b>Office Location<b></th>
                <th><b>Address<b></th>             
				        <th><b>City</b></th>
                <th><b>Zip Code</b></th>
                <th><b>State</b></th>
                <th><b>Country</b></th>
                
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
          <?php
          $t=0;
            foreach ($location_data as $rowwwww) 
            {
              $t++;
          ?>
            <tr>
                <td><?php echo $t;?></td>
                <td><?php echo $rowwwww['office_location'];?></td>
                <td><?php echo $rowwwww['address'];?></td> 
                <td><?php echo $rowwwww['city'];?></td> 
                <td><?php echo $rowwwww['zipcode'];?></td> 
                <td><?php echo $rowwwww['state'];?></td> 
                <td><?php echo $rowwwww['country'];?></td> 
        <td><button type="button" class="btn btn-info location_update" data-toggle="modal" data-target="#myModal6" value="<?php echo $rowwwww['office_loc_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
<button type="button" class="btn btn-info delete_location" value="<?php echo $rowwwww['office_loc_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<!-- Add Purpose -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Add Purpose Details</h4>
        </div>
        <form action="<?=base_url().'Sales_tracker/add_purpose'?>" method="post" id="purpose_form">
        <div class="modal-body">
          <table class="table">
			<tr>
			<td>Purpose</td>
			<td id="purposes"><input type="text" class="form-control" name="purpose" id="purpose" />
        <span id="err_purpose" style="color: red; font-weight: bold;"></span>
      </td>
			</tr>
			</table>
		  
        </div>
        <div class="modal-footer">
		    <button type="submit" class="btn btn-info save" name="submit" value="save">Save</button>
        <button type="submit" class="btn btn-info update" name="update" value="update">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- Add expense category -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <form action="" method="post" id="expense_form">
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Add Expense Category Details</h4>
        </div>
        <div class="modal-body">
          <table class="table">
			<tr>
			<td>Category Name</td>
			<td id="expense_namee"><input type="text" class="form-control" name="expense_name" id="expense_name"/>
      <span id="err_expense" style="color: red; font-weight: bold;"></span>
      </td>
			</tr>
		  </table>
		  </div>
        <div class="modal-footer">
		    <button type="submit" class="btn btn-info add_exp" id="add_exp">Save</button>
        <button type="submit" class="btn btn-info update" id="update_expense" name="update" value="update">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- Add Territory Category Datails -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <form action="" method="post">
      <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Territory Category Details</h4>
      </div>
      <div class="modal-body">
      <table class="table">
			<tr>
			<td>Category Name</td>
			<td id="trr_name"><input type="text" class="form-control" id="territory_cat" name="territory_cat"/>
        <span id="err_terr" style="color:red; font-weight: bold;"></span></td>
			</tr>
		</table>
		  </div>
        <div class="modal-footer">
		    <button type="button" class="btn btn-info save" id="add_territory">Save</button>
        <button type="submit" class="btn btn-info update" id="update_trr" name="update" value="update">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
<!-- Add Industry Category Datails -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <form action="" method="post">
      <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Insdustry Category Details</h4>
      </div>
        <div class="modal-body">
        <table class="table">
			<tr>
			<td>Category Name</td>
			<td id="industry_category"><input type="text" id="industry_cat" name="industry_cat" class="form-control" value=""/>
        <span id="err_industry" style="color:red; font-weight: bold;"></span></td>
			</tr>
		  </table>
		  </div>
        <div class="modal-footer">
		    <button type="button" class="btn btn-info save" id="add_industry">Save</button>
        <button type="submit" class="btn btn-info update_ind" id="update_" name="update" value="update">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
<!-- Add List Details -->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Add List Details</h4>
        </div>
        <div class="modal-body">
          <table class="table">
		  <tr>
			<td>Active</td>
			<td><input type="checkbox" /></td>
			</tr>
			<tr>
			<td>List Name</td>
			<td><input type="text" class="form-control"/></td>
			</tr>
			<tr>
			<td>List Values</td>
			<td><input type="text" class="form-control"/></td>
			</tr>
			</table>
		  </div>
        <div class="modal-footer">
		    <button type="button" class="btn btn-info">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Add Office Location Details -->
  <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog" style="max-width: 700px;">
    <!-- Modal content-->
      <form action="" method="post">
      <div class="modal-content">
        <div class="modal-header">
         <h4 class="modal-title">Add Office Location Details</h4>
        </div>
        <div class="modal-body" style="height:300px;overflow-y: scroll;">
		<div class="row">
		<div class="col-md-6">
		 <div class="form-group">
			<label for="email">Office Location:</label>
			<input type="hidden" name="loct_id" id="loct_id" value="" autocomplete="off">
      <input type="text" class="form-control" id="office_location" value="">
      <span id="err_office_location" style="color: red; font-weight: bold;"></span>
		  </div>
		  <div class="form-group">
			<label for="email">Address:</label>
			<input type="text" class="form-control" id="address" value="" autocomplete="off">
      <span id="err_address" style="color: red; font-weight: bold;"></span>
		  </div>
		  <div class="form-group">
			<label for="email">City:</label>
			<input type="text" class="form-control" id="city" value="" autocomplete="off">
      <span id="err_city" style="color: red; font-weight: bold;"></span>
		  </div>
		  <div class="form-group">
			<label for="email">Zip Code:</label>
			<input type="text" class="form-control" id="zip_code" value="" autocomplete="off">
      <span id="err_zip_code" style="color: red; font-weight: bold;"></span>
		  </div>
		  <div class="form-group">
			<label for="email">State:</label>
			<select class="form-control" name="state" id="state">
        <option>--Select State--</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option> 
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam </option>
        <option value="Bihar">Bihar </option>
        <option value="Chhattisgarh">Chhattisgarh </option>
        <option value="Delhi">Delhi </option>
        <option value="Goa">Goa </option>
        <option value="Gujarat">Gujarat </option>
        <option value="Haryana">Haryana </option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
        <option value="Jharkhand">Jharkhand </option>
        <option value="Karnataka">Karnataka </option>
        <option value="Kerala">Kerala </option>
        <option value="Madhya Pradesh">Madhya Pradesh </option>
        <option value="Maharashtra">Maharashtra </option>
        <option value="Manipur">Manipur </option>
        <option value="Meghalaya">Meghalaya </option>
        <option value="Mizoram">Mizoram </option>
        <option value="Nagaland">Nagaland </option>
        <option value="Odisha">Odisha</option>
        <option value="Punjab">Punjab </option>
        <option value="Rajasthan">Rajasthan </option>
        <option value="Sikkim">Sikkim </option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Telangana">Telangana </option>
        <option value="Tripura">Tripura </option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="Uttarakhand">Uttarakhand</option>
        <option value="West Bengal">West Bengal</option>
      </select>
      <span id="err_state" style="color: red; font-weight: bold;"></span>
		  </div>
		  <div class="form-group">
			<label for="email">County:</label>
        <select class="form-control" name="country" id="country">
          <option>--Select Country--</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Åland Islands">Åland Islands</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="American Samoa">American Samoa</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguilla">Anguilla</option>
        <option value="Antarctica">Antarctica</option>
        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaijan">Azerbaijan</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
        <option value="Belgium">Belgium</option>
        <option value="Belize">Belize</option>
        <option value="Benin">Benin</option>
        <option value="Bermuda">Bermuda</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
        <option value="Botswana">Botswana</option>
        <option value="Bouvet Island">Bouvet Island</option>
        <option value="Brazil">Brazil</option>
        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
        <option value="Brunei Darussalam">Brunei Darussalam</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso">Burkina Faso</option>
        <option value="Burundi">Burundi</option>
        <option value="Cambodia">Cambodia</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Canada">Canada</option>
        <option value="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands">Cayman Islands</option>
        <option value="Central African Republic">Central African Republic</option>
        <option value="Chad">Chad</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Christmas Island">Christmas Island</option>
        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
        <option value="Colombia">Colombia</option>
        <option value="Comoros">Comoros</option>
        <option value="Congo">Congo</option>
        <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
        <option value="Cook Islands">Cook Islands</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
        <option value="Croatia">Croatia</option>
        <option value="Cuba">Cuba</option>
        <option value="Curaçao">Curaçao</option>
        <option value="Cyprus">Cyprus</option>
        <option value="Czech Republic">Czech Republic</option>
        <option value="Denmark">Denmark</option>
        <option value="Djibouti">Djibouti</option>
        <option value="Dominica">Dominica</option>
        <option value="Dominican Republic">Dominican Republic</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egypt">Egypt</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Equatorial Guinea">Equatorial Guinea</option>
        <option value="Eritrea">Eritrea</option>
        <option value="Estonia">Estonia</option>
        <option value="Ethiopia">Ethiopia</option>
        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
        <option value="Faroe Islands">Faroe Islands</option>
        <option value="FJ">Fiji</option>
        <option value="Fiji">Finland</option>
        <option value="France">France</option>
        <option value="French Guiana">French Guiana</option>
        <option value="French Polynesia">French Polynesia</option>
        <option value="French Southern Territories">French Southern Territories</option>
        <option value="Gabon">Gabon</option>
        <option value="Gambia">Gambia</option>
        <option value="Georgia">Georgia</option>
        <option value="Germany">Germany</option>
        <option value="Ghana">Ghana</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Greece">Greece</option>
        <option value="Greenland">Greenland</option>
        <option value="Grenada">Grenada</option>
        <option value="Guadeloupe">Guadeloupe</option>
        <option value="Guam">Guam</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guernsey">Guernsey</option>
        <option value="Guinea">Guinea</option>
        <option value="Guinea-Bissau">Guinea-Bissau</option>
        <option value="Guyana">Guyana</option>
        <option value="Haiti">Haiti</option>
        <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
        <option value="Holy See">Holy See (Vatican City State)</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungary">Hungary</option>
        <option value="Iceland">Iceland</option>
        <option value="India">India</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
        <option value="Iraq">Iraq</option>
        <option value="Ireland">Ireland</option>
        <option value="Isle of Man">Isle of Man</option>
        <option value="Israel">Israel</option>
        <option value="Italy">Italy</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japan">Japan</option>
        <option value="Jersey">Jersey</option>
        <option value="Jordan">Jordan</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Kenya">Kenya</option>
        <option value="Kiribati">Kiribati</option>
        <option value="Korea">Korea, Democratic People's Republic of</option>
        <option value="Korea, Republic of">Korea, Republic of</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
        <option value="Latvia">Latvia</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Lesotho">Lesotho</option>
        <option value="Liberia">Liberia</option>
        <option value="Libya">Libya</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania">Lithuania</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Macao">Macao</option>
        <option value="Macedonia">Macedonia, the former Yugoslav Republic of</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malawi">Malawi</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Maldives">Maldives</option>
        <option value="Mali">Mali</option>
        <option value="MMaltaT">Malta</option>
        <option value="Marshall Islands">Marshall Islands</option>
        <option value="Martinique">Martinique</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Mayotte">Mayotte</option>
        <option value="Mexico">Mexico</option>
        <option value="Micronesia">Micronesia, Federated States of</option>
        <option value="Moldova">Moldova, Republic of</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Montenegro">Montenegro</option>
        <option value="Montserrat">Montserrat</option>
        <option value="Morocco">Morocco</option>
        <option value="Mozambique">Mozambique</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Namibia">Namibia</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Netherlands">Netherlands</option>
        <option value="New Caledonia">New Caledonia</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Nicaragua">Nicaragua</option>
        <option value="Niger">Niger</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Niue">Niue</option>
        <option value="Norfolk Island">Norfolk Island</option>
        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
        <option value="Norway">Norway</option>
        <option value="Oman">Oman</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Palau">Palau</option>
        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
        <option value="Panama">Panama</option>
        <option value="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru">Peru</option>
        <option value="Philippines">Philippines</option>
        <option value="Pitcairn">Pitcairn</option>
        <option value="Poland">Poland</option>
        <option value="Portugal">Portugal</option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Réunion">Réunion</option>
        <option value="Romania">Romania</option>
        <option value="Russian Federation">Russian Federation</option>
        <option value="Rwanda">Rwanda</option>
        <option value="Saint Barthélemy">Saint Barthélemy</option>
        <option value="SSaint Helena, Ascension and Tristan da CunhaH">Saint Helena, Ascension and Tristan da Cunha</option>
        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
        <option value="Saint Lucia">Saint Lucia</option>
        <option value="Saint Martin (French part)">Saint Martin (French part)</option>
        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
        <option value="Samoa">Samoa</option>
        <option value="San Marino">San Marino</option>
        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Senegal">Senegal</option>
        <option value="Serbia">Serbia</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Sierra Leone">Sierra Leone</option>
        <option value="Singapore">Singapore</option>
        <option value="Sint Maarten">Sint Maarten (Dutch part)</option>
        <option value="Slovakia">Slovakia</option>
        <option value="Slovenia">Slovenia</option>
        <option value="Solomon Islands">Solomon Islands</option>
        <option value="Somalia">Somalia</option>
        <option value="South Africa">South Africa</option>
        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
        <option value="South Sudan">South Sudan</option>
        <option value="Spain">Spain</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Sudan">Sudan</option>
        <option value="Suriname">Suriname</option>
        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
        <option value="Swaziland">Swaziland</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
        <option value="Taiwan">Taiwan, Province of China</option>
        <option value="Tajikistan">Tajikistan</option>
        <option value="Tanzania">Tanzania, United Republic of</option>
        <option value="Thailand">Thailand</option>
        <option value="Timor-Leste">Timor-Leste</option>
        <option value="Togo">Togo</option>
        <option value="Tokelau">Tokelau</option>
        <option value="Tonga">Tonga</option>
        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
        <option value="Tunisia">Tunisia</option>
        <option value="TurkeyR">Turkey</option>
        <option value="TurkmenistanM">Turkmenistan</option>
        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
        <option value="Tuvalu">Tuvalu</option>
        <option value="Uganda">Uganda</option>
        <option value="Ukraine">Ukraine</option>
        <option value="United Arab Emirates">United Arab Emirates</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="United States">United States</option>
        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
        <option value="Uruguay">Uruguay</option>
        <option value="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Venezuela">Venezuela, Bolivarian Republic of</option>
        <option value="Viet Nam">Viet Nam</option>
        <option value="Virgin Islands, British">Virgin Islands, British</option>
        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
        <option value="Wallis and Futuna">Wallis and Futuna</option>
        <option value="Western Sahara">Western Sahara</option>
        <option value="YemenYE">Yemen</option>
        <option value="Zambia">Zambia</option>
        <option value="Zimbabwe">Zimbabwe</option>
      </select>
      <span id="err_country" style="color: red; font-weight: bold;"></span>
		  </div>
		 </div>
		<div class="col-md-6">
		<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="280" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d3506.4934767901073!2d77.15876901507951!3d28.494797182472393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d28.4916776!2d77.1600089!4m5!1s0x390ce1ac16deef4b%3A0xabed5794af14c202!2sindian+smart+hub!3m2!1d28.4978692!2d77.1598135!5e0!3m2!1sen!2sin!4v1565155105392!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe><a href="https://www.crocothemes.net">wordpress themes;</a></div><style>.mapouter{position:relative;text-align:right;height:280px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:280px;width:100%;}</style></div>
		</div>
		  
		</div>
        </div>
        <div class="modal-footer">
		    <button type="button" class="btn btn-info add_location" id="office_location">Save</button>
        <button type="submit" class="btn btn-info update_loc" id="update_" name="update" value="update">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  </div><!-- content -->
<script src="<?=base_url()?>lib/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>lib/feather-icons/feather.min.js"></script>
<script src="<?=base_url()?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/js/dashforge.js"></script>
<script>
$(function(){
'use strict'
});
</script>
<script>
$(document).ready(function() {
$('#example').DataTable();
});
</script>
<script>
$(document).ready(function() {
$('#example1').DataTable();
});
</script>
<script>
$(document).ready(function() {
$('#example2').DataTable();
});
</script>
<script>
$(document).ready(function() {
$('#example3').DataTable();
});
</script>
<script>
$(document).ready(function() {
$('#example4').DataTable();
});
</script>
<script>
$(document).ready(function() {
$('#example5').DataTable();
});
</script>
<script>
$(document).ready(function(){
$('#tab1').addClass('show');
$('#tab2').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#btn1').click(function(){
$('#tab1').removeClass('hide');
$('#tab2').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
});
$('#btn2').click(function(){
$('#tab2').removeClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
});

$('#btn3').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').removeClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
});

$('#btn4').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').removeClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
});

$('#btn5').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').removeClass('hide');
$('#tab6').addClass('hide');
});

$('#btn6').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').removeClass('hide');
});

});
</script>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
$('#purpose_form').on('submit',function(){

var purpose_name= $('#purpose').val();
if (purpose_name=="")
{
$('#err_purpose').html("**Please Enter Purpose!");
return false;
}
else
{
$('#err_purpose').html("");
}
});
});
</script>
<script>
$(document).ready(function(){
$('.update').hide();
  $('.purpose').click(function(){
    var pur_id = $(this).val();
   
    $.ajax({
      url:'<?php echo base_url('Sales_tracker/update_purpose');?>',
      type:'POST',
      dataType:'html',
      data:{pur_id:pur_id},
      success:function(data)
      {
      var purpose = $.parseJSON(data);
      $('#purpose').val(purpose[0].purpose_name);
      $('#purposes').append('<input type="hidden" class="form-control" name="purpose_id" id="purpose_id" value="'+purpose[0].purpose_id+'"/>');
      $('.save').hide();
      $('.update').show();
      }
    });
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
$('.add_exp').on('click',function(){
  var expense_name=$('#expense_name').val();
  if (expense_name=="")
   {
    $('#err_expense').html("**Please Enter Expense Category!");
    return false;
   }
  $.ajax({
      url:'<?php echo base_url('Sales_tracker/add_expense');?>',
      type:'POST',
      dataType:'html',
      data:{expense_name:expense_name},
      success:function(data)
      {
        if(data)
        {
          $("#myModal2").removeClass('show');
            location.reload();
        }
      }
});
});
});
</script>
<!-- delete ajax -->
<script type="text/javascript">
  $(document).ready(function(){
$('.exp_del').on('click',function(){
  var id=$(this).val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/delete_exp');?>',
      type:'POST',
      dataType:'html',
      data:{id:id},
      success:function(data)
      {
        location.reload();
      }
});
});
});
</script>
<!-- end delete ajax -->
<script>
$(document).ready(function(){
$('.update').hide();
  $('.expense').click(function(){
    var exp_id = $(this).val();
    $.ajax({
      url:'<?php echo base_url('Sales_tracker/update_exp');?>',
      type:'POST',
      dataType:'html',
      data:{exp_id:exp_id},
      success:function(data)
      {
      var expense_name = $.parseJSON(data);
      $('#expense_name').val(expense_name[0].  exp_category);
      $('#expense_namee').append('<input type="hidden" class="form-control" name="expense_id" id="expense_id" value="'+expense_name[0].exp_id+'"/>');
      $('.add_exp').hide();
      $('.update').show();
      }
    });
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#update_expense').on('click',function(){
var exp_name=$('#expense_name').val();
var exp_id=$('#expense_id').val();
 $.ajax({
      url:'<?php echo base_url('Sales_tracker/update_expense');?>',
      type:'POST',
      dataType:'html',
      data:{exp_name:exp_name,exp_id:exp_id},
      success:function(data)
      {
     
      }
    });
});
});
</script>
<!-- add territory -->
<script type="text/javascript">
$(document).ready(function(){
$('#add_territory').on('click',function(){
var territory_cat=$('#territory_cat').val();
if (territory_cat=="")
 {
  $('#err_terr').html("**Please Enter Territory Category!");
  return false;
 }
  $.ajax({
      url:'<?php echo base_url('Sales_tracker/add_territory');?>',
      type:'POST',
      dataType:'html',
      data:{territory_cat:territory_cat},
      success:function(data)
      {
        if(data)
        {
          $("#myModal3").removeClass('show');

            location.reload();
            $('#msg_succ').html("Territory Add Successfully");
        }
      }
});
});
});
</script>
<!-- end  territory -->

<!-- update territory -->
<script>
  $(document).ready(function(){
    $('#update_trr').on('click',function(){
      var territory_cat=$('#territory_cat').val();
      var territory_id = $('#trr_id').val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/updt_territory');?>',
      type:'POST',
      dataType:'html',
      data:{territory_cat:territory_cat,territory_id:territory_id},
      success:function(data)
      {
        if(data)
        {
          $("#myModal3").removeClass('show');
            location.reload();
        }
      }
});
    });
  });
</script>
<!-- update territory end -->
<script type="text/javascript">
  $(document).ready(function(){
$('.terr_del').on('click',function(){
  var id=$(this).val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/delete_trr');?>',
      type:'POST',
      dataType:'html',
      data:{id:id},
      success:function(data)
      {
       location.reload();
      }
});
});
});
</script>
<script>
$(document).ready(function(){
$('.update').hide();
  $('.trr').click(function(){
    var trr_id = $(this).val();
  
    $.ajax({
      url:'<?php echo base_url('Sales_tracker/update_terr');?>',
      type:'POST',
      dataType:'html',
      data:{trr_id:trr_id},
      success:function(data)
      {
      var territory_cat = $.parseJSON(data);
      $('#territory_cat').val(territory_cat[0].territory_name);
      $('#trr_name').append('<input type="hidden" class="form-control" name="trr_id" id="trr_id" value="'+territory_cat[0].territory_id+'"/>');
      $('.save').hide();
      $('.update').show();
      }
    });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('#add_industry').on('click',function(){
var industry_cat=$('#industry_cat').val();
if (industry_cat=="")
 {
  $('#err_industry').html("**Please Enter Industry Category!");
  return false;
 }
  $.ajax({
      url:'<?php echo base_url('Sales_tracker/add_industry');?>',
      type:'POST',
      dataType:'html',
      data:{industry_cat:industry_cat},
      success:function(data)
      {
        if(data)
        {
          $("#myModal4").removeClass('show');
            location.reload();
        }
      }
});
});
});
</script>
<!-- add industry category -->
<script type="text/javascript">
  $(document).ready(function(){
$('.delete_industry').on('click',function(){
  var id=$(this).val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/delete_industry');?>',
      type:'POST',
      dataType:'html',
      data:{id:id},
      success:function(data)
      {
       location.reload();
      }
});
});
});
</script>


<script>
$(document).ready(function(){
$('.update_ind').hide();
  $('.industry_update').click(function(){
    var industry_id = $(this).val();

  $.ajax({
      url:'<?php echo base_url('Sales_tracker/update_industry');?>',
      type:'POST',
      dataType:'html',
      data:{industry_id:industry_id},
      success:function(data)
      {
      var industry_cat = $.parseJSON(data);
      $('#industry_cat').val(industry_cat[0].industry_name);
      $('#industry_category').append('<input type="hidden" class="form-control" name="inds_id" id="inds_id" value="'+industry_cat[0].industry_id+'"/>');
      $('.save').hide();
      $('.update_ind').show();
      }
    });
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.update_ind').on('click',function(){
 var industry_cat=$('#industry_cat').val();
 var inds_id=$('#inds_id').val();
$.ajax({
      url:'<?php echo base_url('Sales_tracker/updt_industry');?>',
      type:'POST',
      dataType:'html',
      data:{industry_cat:industry_cat,inds_id:inds_id},
      success:function(data)
      {
     
      }
    });
});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
$('.add_location').on('click',function(){
  var office_location= $('#office_location').val();
  var address= $('#address').val();
  var city= $('#city').val();
  var zip_code= $('#zip_code').val();
  var state= $('#state').val();
  var country= $('#country').val();
  if (office_location=="")
   {
    $("#err_office_location").html("**Please Enter Office Location!");
    return false;
   }
   else
   {
    $("#err_office_location").html("");
   }
   if (address=="")
    {
    $("#err_address").html("**Please Enter Address!");
    return false;
   }
   else
   {
    $("#err_address").html("");
   }
   if(city=="")
    {
    $("#err_city").html("**Please Enter City!");
      return false;
   }
   else
   {
    $("#err_city").html("");
   }
   if (zip_code=="")
    {
    $("#err_zip_code").html("**Please Enter Zip Code!");
    return false;
   }
   else
   {
    $("#err_zip_code").html("");
   }
  if ($("#state")[0].selectedIndex <= 0)
  {
  $('#err_state').html("**Please Selcet State!");
  return false;
  }
  else
  {
  $('#err_state').html("");
  }
if ($("#country")[0].selectedIndex <= 0)
  {
  $('#err_country').html("**Please Selcet Country!");
  return false;
  }
  else
  {
  $('#err_country').html("");
  }

  $.ajax({
      url:'<?php echo base_url('Sales_tracker/add_location');?>',
      type:'POST',
      dataType:'html',
      data:{office_location:office_location,address:address,city:city,zip_code:zip_code,state:state,country:country},
      success:function(data)
      {
        if(data)
        {
          $("#myModal2").removeClass('show');
            location.reload();
        }
      }
});
});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
$('.delete_location').on('click',function(){
  var id=$(this).val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/delete_location');?>',
      type:'POST',
      dataType:'html',
      data:{id:id},
      success:function(data)
      {
       location.reload();
      }
});
});
});
</script>
<script>
$(document).ready(function(){
$('.update_loc').hide();
  $('.location_update').click(function(){
    var location_id = $(this).val();
    $.ajax({
      url:'<?php echo base_url('Sales_tracker/update_location');?>',
      type:'POST',
      dataType:'html',
      data:{location_id:location_id},
      success:function(data)
      {
      var location_data = $.parseJSON(data);
      $('#office_location').val(location_data[0].office_location);
      $('#address').val(location_data[0].address);
      $('#city').val(location_data[0].city);
      $('#zip_code').val(location_data[0].zipcode);
      $('#state').val(location_data[0].state);
      $('#country').val(location_data[0].country);
      $('#loct_id').val(location_data[0].office_loc_id);
      
      $('.add_location').hide();
      $('.update_loc').show();
      }
    });
  });
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.update_loc').on('click',function(){
 var office_location=$('#office_location').val();
 var address=$('#address').val();
 var city=$('#city').val();
 var zip_code=$('#zip_code').val();
 var state=$('#state').val();
var country=$('#country').val();
 var loct_id=$('#loct_id').val();
$.ajax({
      url:'<?php echo base_url('Sales_tracker/updt_location');?>',
      type:'POST',
      dataType:'html',
      data:{loct_id:loct_id,office_location:office_location,address:address,city:city,zip_code:zip_code,state:state,country:country},
      success:function(data)
      {
    
      }
    });
});
});
</script>










