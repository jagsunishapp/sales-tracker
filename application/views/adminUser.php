<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="sidebar-nav">
          <li class="nav-label mg-b-15">Status</li>
          <li class="nav-item">
          	<input type="radio" name="optradio" id="active_users" value="1">Active</li>
		  <li class="nav-item">
		  	<input type="radio" name="optradio" id="inactive_users" value="0">Inactive</li>
            <br>
            <br>
			<br>
			<button class="btn btn-info" id="clr_filter">Clear Filters</button>
        </ul>
      </div>
 <!-- sidebar-body -->
</div>
<!-- sidebar -->
<div class="content content-components">
<div class="row tx-14">
<div class="col-md-12 text-right" style="padding-bottom:20px;">
<a href="<?php echo base_url('Sales_tracker/view/adminImportUser');?>" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Import users</a>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Users</button>
</div>
<h4 style="color: green; font-weight: bold;"><?php echo $this->session->flashdata('success'); ?></h4>
<h4 style="color: red; font-weight: bold;"><?php echo $this->session->flashdata('successs'); ?></h4>
<span id="succ_msg" style="color: green; font-weight: bold;"></span>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr><th><b>SNo.</b></th>
                <th><b>Emp. Code</b></th>
                <th><b>Name</b></th>
                <th><b>Email</b></th>
                <th><b>Mobile</b></th>
                <th><b>Status</b></th>
                <th><b>Attendance Status</b></th>
				<th><b>DateTime</b></th>
				<th><b>Action</b></th>
            </tr>
        </thead>
        <tbody id="users_details">
        	<?php
        	$i=0;
        	foreach ($users_dataa as $user_data) 
        	{
            $i++;
        	?>
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $user_data['emp_code']; ?></td>
			<td><?php echo $user_data['first_name']; ?> <?php echo $user_data['last_name']; ?></td>
			<td><?php echo $user_data['email']; ?></td>
			<td><?php echo $user_data['mobile_no']; ?></td>
			<td>
			<form action="<?php echo base_url('Sales_tracker/update_status_user');?>" method="post">
            <input type="hidden" name="user_abc" value="<?php echo $user_data['login_id'];?>">
		    <?php
            if ($user_data['status']==1)
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
		<td></td>
		<td></td>
		<td><button type="button" class="btn btn-info user_update" data-toggle="modal" data-target="#myModal" value="<?php echo $user_data['login_id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
     <button type="button" class="btn btn-info delete_user" value="<?php echo $user_data['login_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
    </td>
			</tr>
           <?php
       }
       ?>
        </tbody>
    </table>
 <!-- Add User Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add User Details</h4>
        </div>
        <div class="modal-body">
		<br>
		<div style="height: 350px;overflow: scroll;overflow-x: hidden;">
			<form action="<?php echo base_url('Sales_tracker/add_user');?>" method="post" id="user_form">
				<table class="table" id="tab1">
		       <tbody>
				  <tr>
					<td>First Name</td>
					<td id="login_idd"><input type="text" class="form-control" id="fname" name="fname">
				    <span id="err_fname" style="color: red; font-weight: bold;"></span>

					</td></tr>
					<tr>
					<td>Last Name</td>
					<td><input type="text" class="form-control" id="lname" name="lname">
						<span id="err_lname" style="color: red; font-weight: bold;"></span></td></tr>
					<tr>
					<td>Emp. Code</td>
					<td><input type="text" class="form-control" id="emp_code" name="emp_code">
						<span id="err_emp_code" style="color: red; font-weight: bold;"></span></td></tr>
					<tr>
					<td>Designation</td>
					<td><input type="text" class="form-control designation" name="designation" id="designation" value="" autocomplete="off">
						<span id="err_designation" style="color: red; font-weight: bold;"></span></td>					
				    </tr>
					<tr>
					<td>Role</td>
					<td>
					<select class="form-control" id="role" name="role">
					<option>--Select Role--</option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
					</select>
					<span id="err_role" style="color: red; font-weight: bold;"></span>
					</td>					
				  </tr>
					<tr>
					<td>Reports To</td>
					<td>
					  <select class="form-control" id="report_to" name="report_to">
						<option>--Select Report To--</option>
						<?php
                        foreach ($users_data as $row_user)
                        {
                        ?>
                       <option value="<?php echo $row_user['emp_code'];?>"><?php echo $row_user['first_name'];?> <?php echo $row_user['last_name'];?> (<?php echo $row_user['emp_code'];?>)</option>
					<?php
					}
                    ?>
					</select>
					<span id="err_report_to" style="color: red; font-weight: bold;"></span>
                   </td>					
				  </tr>
                  <tr>
				 <td>Office Location</td>
					<td>
					<select class="form-control" id="off_loc" name="off_loc">
					<option>--Select Office Location--</option>
						  <?php
                          foreach ($location_data as $row_location) 
                            {
                            ?>
							<option value="<?php echo $row_location['address'];?>"><?php echo $row_location['office_location'];?></option>
						<?php
						}
						?>
					</select>
					<span id="err_off_loc" style="color: red; font-weight: bold;"></span>
                    </td>					
				  </tr>
					<tr>
					<td>Email</td>

					<td><input type="text" class="form-control" name="email" id="email">
						<span id="err_email" style="color: red; font-weight: bold;"></span></td></tr>
					<tr>
					<td>Password</td>
					<td><input type="text" class="form-control" name="password" id="password">
						<span id="err_password" style="color: red; font-weight: bold;"></span></td></tr>
					<td>Mobile No.</td>
					<td><input type="text" class="form-control" name="mobile_no" id="mobile_no">
						<span id="err_mobile_no" style="color: red; font-weight: bold;"></span></td>					
				  </tr>
                  <tr>
					<td>Accuracy (In Meters)</td>
					<td>
				    <select class="form-control" id="accuracy" name="accuracy">
				    <option>--Select Accuracy--</option>
							<option value="50">50</option>
							<option value="100">100</option>
							<option value="250">250</option>
							<option value="500">500</option>
							<option value="1000">1000</option>
							<option value="2500">2500</option>
							<option value="5000">5000</option>
						  </select>
						  <span id="err_accuracy" style="color: red; font-weight: bold;"></span>
					</td>					
				  </tr>
                    <tr>
					<td>Check-In Radius (In Meters)</td>
					<td>
						  <select class="form-control" id="radius" name="radius">
						  	<option>--Select Radius--</option>
						    <option value="50">50</option>
							<option value="100">100</option>
							<option value="250">250</option>
							<option value="500">500</option>
							<option value="1000">1000</option>
							<option value="2500">2500</option>
							<option value="5000">5000</option>
					  </select>
					   <span id="err_radius" style="color: red; font-weight: bold;"></span>
					</td>					
				  </tr>
					<tr>
					<td>Allow Timeout</td>
					<td><input type="checkbox" value="1" name="allow_timeout" id="allow_timeout" checked>
					 <span id="err_allow_timeout" style="color: red; font-weight: bold;"></span></td>					
				  </tr>
				   <tr>
					<td>Allow Offline</td>
					<td><input type="checkbox" value="1" name="allow_offline" id="allow_offline">
					<span id="err_allow_offline" style="color:red; font-weight: bold;"></span></td></tr>
				</tbody>
			  </table>
        </div>
        </div>
        <div class="modal-footer">
		<button type="submit" name="submit" id="add-user" class="btn btn-info save">Save</button>
		<button type="button" class="btn btn-info update_uu" id="update_" name="update" value="update">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
</div>
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
$(document).ready(function(){
$('#example').DataTable();
});
</script>
</body>
</html>
<script>
$(document).ready(function(){
$('#tab1').addClass('show');
$('#btn1').click(function(){
$('#tab1').removeClass('hide');
$('#tab2').addClass('hide');
});
$('#btn2').click(function(){
$('#tab2').removeClass('hide');
$('#tab1').addClass('hide');
});
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
$('.delete_user').on('click',function(){
  var id=$(this).val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/delete_users');?>',
      type:'POST',
      data:{id:id},
      success:function(data)
      {
        location.reload();
      }
});
});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
$('#active_users').on('click',function(){
var active_id=$(this).val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/active_users_con');?>',
      type:'POST',
      dataType:'html',
      data:{active_id:active_id},
      success:function(data)
    {
    $('#users_details').html(data);
    }
});
});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
$('#inactive_users').on('click',function(){
var inactive_id=$(this).val();
      $.ajax({
      url:'<?php echo base_url('Sales_tracker/inactive_users_con');?>',
      type:'POST',
      dataType:'html',
      data:{inactive_id:inactive_id},
      success:function(data)
      {
       $('#users_details').html(data);
      }
});
});
});
</script>
<script>
$(document).ready(function(){
$('.update_uu').hide();
$('.user_update').click(function(){
var login_id = $(this).val();
$.ajax({
      url:'<?php echo base_url('Sales_tracker/update_users');?>',
      type:'POST',
      dataType:'html',
      data:{login_id:login_id},
      success:function(data)
      {
      var user_detail = $.parseJSON(data);
      $('#fname').val(user_detail[0].first_name);
      $('#lname').val(user_detail[0].last_name);
      $('#emp_code').val(user_detail[0].emp_code);
      $('#designation').val(user_detail[0].designation);
      $('#role').val(user_detail[0].role);
      $('#report_to').val(user_detail[0].report_to);
      $('#email').val(user_detail[0].email);
      $('#password').val(user_detail[0].password);
      $('#mobile_no').val(user_detail[0].mobile_no);
      $('#off_loc').val(user_detail[0].office_location);
      $('#accuracy').val(user_detail[0].accuracy);
      $('#radius').val(user_detail[0].radius);
      $('#allow_timeout').val(user_detail[0].allow_timeout);
      $('#allow_offline').val(user_detail[0].allow_offline);
      $('#login_idd').append('<input type="hidden" class="form-control" name="user_id" id="user_id" value="'+user_detail[0].login_id+'"/>');
      $('.save').hide();
      $('.update_uu').show();
      }
    });
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
 $('#update_').on('click',function(){
 var user_id=$('#user_id').val();
 var fname=$('#fname').val();
 var lname=$('#lname').val();
 var emp_code=$('#emp_code').val();
 var designation=$('#designation').val();
 var role=$('#role').val();
 var report_to=$('#report_to').val();
 var off_loc=$('#off_loc').val();
 var email=$('#email').val();
 var password=$('#password').val();
 var mobile_no=$('#mobile_no').val();
 var accuracy=$('#accuracy').val();
 var radius=$('#radius').val();
 var allow_timeout=$('#allow_timeout').val();
 var allow_offline=$('#allow_offline').val();
$.ajax({ 
       url:'<?php echo base_url('Sales_tracker/updt_users');?>',
      type:'POST',
      dataType:'html',
      data:{user_id:user_id,fname:fname,lname:lname,emp_code:emp_code,designation:designation,role:role,report_to:report_to,off_loc:off_loc,email:email,password:password,mobile_no:mobile_no,accuracy:accuracy,radius:radius,allow_timeout:allow_timeout,allow_offline:allow_offline},
      success:function(data)
      {
   if(data)
    {
     // $('#myModal').modal('hide');
     $("#myModal").removeClass('show');
     location.reload();
    }
    }
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#user_form').on('submit',function(){
	var fname=$('#fname').val();
	var lname=$('#lname').val();
	var emp_code=$('#emp_code').val();
	var designation=$('#designation').val();
	var role=$('#role').val();
	var report_to=$('#report_to').val();
	var off_loc=$('#off_loc').val();
	var email=$('#email').val();
	var password=$('#password').val();
	var mobile_no=$('#mobile_no').val();
	var accuracy=$('#accuracy').val();
	var radius=$('#radius').val();
	var allow_timeout=$('#allow_timeout').val();
	var allow_offline=$('#allow_offline').val();
   if (fname=="") 
	{
       $('#err_fname').html("**Please Enter First Name!");
       return false;
	}
	else
	{
     $('#err_fname').html("");
	}
	if (lname=="")
	 {
    $('#err_lname').html("**Please Enter Last Name!");
    return false;
	}
	else
	{
    $('#err_lname').html("");
	}
	if (emp_code=="") 
	{
		$('#err_emp_code').html("**Please Enter Employee Code!");
		return false;
	}
	else
	{
		$('#err_emp_code').html("");
	}
	if (designation=="") 
	{
    $('#err_emp_code').html("**Please Enter Designation!");
	return false;
	}
	else
	{
	$('#err_emp_code').html("");
	}
if ($("#role")[0].selectedIndex <= 0)
  {
  $('#err_role').html("**Please Selcet Role!");
  return false;
  }
  else
  {
  $('#err_role').html("");
  }
  if ($("#report_to")[0].selectedIndex <= 0)
  {
  $('#err_report_to').html("**Please Selcet Report To!");
  return false;
  }
  else
  {
  $('#err_report_to').html("");
  }
  if ($("#off_loc")[0].selectedIndex <= 0)
  {
  $('#err_off_loc').html("**Please Selcet Office Location!");
  return false;
  }
  else
  {
  $('#err_off_loc').html("");
  }
  if (email=="")
  {
  $('#err_email').html("**Please Enter Email!");
  return false;
  }
  else
  {
  $('#err_email').html("");
  }
  if (password=="")
  {
  $('#err_password').html("**Please Enter Password!");
  return false;
  }
  else
  {
  $('#err_password').html("");
  }
  if (mobile_no=="")
  {
  $('#err_mobile_no').html("**Please Enter Mobile!");
  return false;
  }
  else
  {
  $('#err_mobile_no').html("");
  }
  if ($("#accuracy")[0].selectedIndex <= 0)
  {
  $('#err_accuracy').html("**Please Selcet Accuracy!");
  return false;
  }
  else
  {
  $('#err_accuracy').html("");
  }
  if ($("#radius")[0].selectedIndex <= 0)
  {
  $('#err_radius').html("**Please Selcet Radius!");
  return false;
  }
  else
  {
  $('#err_radius').html("");
  }
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#clr_filter').on('click',function(){
location.reload();
});
});
</script>