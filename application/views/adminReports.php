    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
      <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
      <h5>Components</h5>
      <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
      <ul class="sidebar-nav">
      <li class="nav-label mg-b-15">Reports</li>
      <li class="nav-item"><a href="#" id="btn1"> Attendance</a></li>
      <li class="nav-item"><a href="#" id="btn2">Visit</a></li>
      <li class="nav-item"><a href="#" id="btn3">Expense</a></li>
      <li class="nav-item"><a href="#" id="btn4">Travel</a></li>
      <br>
      <li class="nav-label mg-b-15">MIS Reports</li>
      <li class="nav-item"><a href="#" id="btn5">Monthly Travel</a></li>
      <li class="nav-item"><a href="#" id="btn6">Monthly Attendance</a></li>
      <br>
      <li class="nav-label mg-b-15">Custom Form Reports</li>
      <?php
      foreach($forms as $fm)
      {
      ?>
      <li class="nav-item show">
      <a href="#" class="nav-link btn7" id="<?=$fm['forms_id']?>"><?=$fm['form_name']?></a>
      </li>
      <?php
      }
      ?>
      </ul>
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content content-components">
   <div class="row tx-14" id="tab1">
	
	<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<h3>Search Attendance</h3>
	
	<form>
	<div class="row">
	<div class="col-md-5">
  <div class="form-group">
    <label for="email">Date Range:</label>
    <input type="date" class="form-control" id="attend_from" name="attend_from">
  </div>
  </div>
  <div class="col-md-5">
  <div class="form-group">
    <label for="pwd">To:</label>
    <input type="date" class="form-control" id="attend_to" name="attend_to">
  </div>
  </div>

<div class="col-md-2">
<label for="pwd">&nbsp;</label><br>
  <button type="button" class="btn btn-info" id="attend_show" name="attend_show">Show</button>
  </div>
  </div>
</form>

	</div>
	</div>
	</div>



	<!-- <div class="col-md-12 text-right" style="padding:20px 0px;">
	<a href="#" class="btn btn-info" download><i class="fa fa-file-text-o" aria-hidden="true"></i> Save as CSV</a>
	

	</div> -->


			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>SNo.</b></th>
                <th><b>EMP code</b></th>
                <th><b>Name</b></th>
                <th><b>Punch in Date</b></th>
                <th><b>Punch in</b></th>
                <th><b>Punch in Location</b></th>
                <th><b>Punch out Date</b></th>
                <th><b>Punch out</b></th>
                <th><b>Punch out Location</b></th>
                <th><b>Time out</b></th>
                <th><b>Worked for</b></th>
            </tr>
        </thead>
        <tbody id="report_ateend_det">
           
        </tbody>
    </table>



  
     
        </div><!-- row -->
		
		<div class="row tx-14" id="tab2">
		
		<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<h3>Search Visit</h3>
	
	<form>
	
	<div class="row">
  <div class="col-md-4">
  <div class="form-group">
    <label for="email">User:</label>
    <select class="form-control" id="user_visit" name="user_visit">
    <option>--Select User--</option>
    <?php
    foreach ($users_dataa as $row_user)
    {
    ?>
    <option value="<?php echo $row_user['emp_code'];?>"><?php echo $row_user['first_name'];?> <?php echo $row_user['last_name'];?> (<?php echo $row_user['emp_code'];?>)</option>
    <?php
    }
    ?>
  </select>
  </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
    <label for="email">Date Range:</label>
    <input type="date" class="form-control" id="visit_to_date" name="visit_to_date">
  </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
    <label for="pwd">To:</label>
    <input type="date" class="form-control" id="visit_from_date" name="visit_from_date">
  </div>
  </div>

<div class="col-md-2">
<label for="pwd">&nbsp;</label><br>
  <button type="button" class="btn btn-info" id="visit_details">Show</button>
  </div>
  </div>
</form>

  </div>
	</div>
	</div>



	<!-- <div class="col-md-12 text-right" style="padding:20px 0px;">
	<a href="#" class="btn btn-info" download><i class="fa fa-file-text-o" aria-hidden="true"></i> Save as CSV</a>
	

	</div> -->


			<table id="example2" class="table table-striped table-bordered" style="width:100%">
      <thead>
            <tr>
            <th><b>Customer</b></th>
            <th><b>visit</b></th>
            <th><b>Date</b></th>
            <th><b>Start Time</b></th>
            <th><b>End Time</b></th>
            <th><b>Purpose</b></th>
            <th><b>Owner</b></th>
            <th><b>Status</b></th>
            <th><b>Outcome</b></th>
            <th><b>Outcome Description</b></th>
            <th><b>Status</b></th>
            </tr>
        </thead>
        <tbody id="report_visit_det">
        </tbody>
  </table>
		</div>
		
		<div class="row tx-14" id="tab3">
		
			<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<h3>Search Expense</h3>
	
	<form>
	
	<div class="row">
	<div class="col-md-4">
  <div class="form-group">
    <label for="email">User</label>
    <select class="form-control" id="select_user">
   <option>--Select User--</option>
    <?php
    foreach ($users_dataa as $row_user)
    {
    ?>
    <option value="<?php echo $row_user['emp_code'];?>"><?php echo $row_user['first_name'];?> <?php echo $row_user['last_name'];?> (<?php echo $row_user['emp_code'];?>)</option>
    <?php
    }
    ?>
   
  </select>
  </div>
  </div>
  
	
	<div class="col-md-3">
  <div class="form-group">
    <label for="email">Date Range:</label>
    <input type="date" class="form-control" id="from_date_exp" name="from_date_exp">
  </div>


  </div>
  <div class="col-md-3">
  <div class="form-group">
    <label for="pwd">To:</label>
    <input type="date" class="form-control" id="to_date_exp" name="to_date_exp">
  </div>
  </div>
<div class="col-md-2">
<label for="pwd">&nbsp;</label><br>
  <button type="button" class="btn btn-info exp_details" id="exp_details">Show</button>
  </div>
  </div>
</form>

  </div>
	</div>
	</div>



	<!-- <div class="col-md-12 text-right" style="padding:20px 0px;">
	<a href="#" class="btn btn-info" download><i class="fa fa-file-text-o" aria-hidden="true"></i> Save as CSV</a>
	

	</div> -->


			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>SNO.</b></th>
                <th><b>Expenses</b></th>
                <th><b>Expense Category</b></th>
                <th><b>Date</b></th>
                <th><b>Customer</b></th>
                <th><b>Visit</b></th>
                <th><b>Approved / Rejected By</b></th>
                <th><b>Approved / Rejected On</b></th>
                <th><b>Rejected Reason</b></th>
                <th><b>Amount Claimed</b></th>
                <th><b>Disbursed Amount</b></th>
                <th><b>Status</b></th>
        </thead>
        <tbody id="report_exp_det">
        </tbody>
        
    </table>
		
		
		</div>
		
		<div class="row tx-14" id="tab4">
		
			<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<h3>Search Travel</h3>
	
	<form>
	
	<div class="row">
	<div class="col-md-5">
  <div class="form-group">
    <label for="email">User :</label>
    <select class="form-control" id="select_travel" name="select_travel">
    <option>--Select User--</option>
    <?php
    foreach ($users_dataa as $row_user)
    {
    ?>
    <option value="<?php echo $row_user['emp_code'];?>"><?php echo $row_user['first_name'];?> <?php echo $row_user['last_name'];?> (<?php echo $row_user['emp_code'];?>)</option>
    <?php
    }
    ?>
  </select>
  </div>
  </div>
  
	
	<div class="col-md-3">
  <div class="form-group">
    <label for="email">Date :</label>
    <input type="date" class="form-control" id="travel_date" name="travel_date">
  </div>
  </div>


<div class="col-md-2">
<label for="pwd">&nbsp;</label><br>
  <button type="button" class="btn btn-info travel_details" id="travel_details">Show</button>
  </div>
  </div>
</form>
</div>
	</div>
	</div>
<!-- <div class="col-md-12 text-right" style="padding:20px 0px;">
	<a href="#" class="btn btn-info" download><i class="fa fa-file-text-o" aria-hidden="true"></i> Save as CSV</a>
	</div> -->


			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>SNo</b></th>
                <th><b>Time</b></th>
                <th><b>Location</b></th>
                <th><b>Latitude</b></th>
                <th><b>Longitude</b></th>
                <th><b>Distance (in kms)</b></th>
                <th><b>Battery Percentage</b></th>
                <th><b>GPS (Y/N)</b></th>
                <th><b>Connectivity</b></th>
                <th><b>App Version</b></th>
                <th><b>Mobile OS Version</b></th>
                <th><b>Device Name</b></th>
                <th><b>Mobile Location</b></th>
            </tr>
        </thead>
        <tbody id="report_travel_det">
        </tbody>
        
    </table>
		
		</div>
		
		<div class="row tx-14" id="tab5">
		
				<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<h3>Search Monthly Travel</h3>
	
	<form action="">
	
	<div class="row">
	<div class="col-md-4">
  <div class="form-group">
    <label for="email">&nbsp;</label>
    <select class="form-control" id="member2" name="mem"> 
      <option>--Select User--</option>
      <?php
      foreach ($users_dataa as $row_user)
      {
      ?>
      <option value="<?php echo $row_user['emp_code'];?>"><?php echo $row_user['first_name'];?> <?php echo $row_user['last_name'];?> (<?php echo $row_user['emp_code'];?>)</option>
      <?php
      }
      ?>
  </select>
  </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
    <label for="email">Date Range:</label>
    <input type="date" class="form-control" id="start_travel_dt" name="st_dt">
  </div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="pwd">To:</label>
<input type="date" class="form-control" id="end_travel_dt" name="end_dt">
</div>
</div>
<div class="col-md-2">
<label for="pwd">&nbsp;</label><br>
<button type="submit" class="btn btn-info show_mon_travel">Show</button>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="col-md-12 text-right" style="padding:20px 0px;">
<a href="" class="btn btn-info monthly_tra_report"><i class="fa fa-file-text-o" aria-hidden="true"></i> Save as CSV</a>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><b>User</b></th>
                <th><b>Total Distance Travelled ( In Kms)</b></th>
                <th><b>Total Visits</b></th>
      </thead>
        <tbody id="monthly_travel">
            <tr>
              <td colspan="3">Data not available</td>
            </tr>
        </tbody>
    </table>
		
		
		</div>
		
		<div class="row tx-14" id="tab6">
		
				<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<h3>Search Monthly Attendence</h3>
	
	<form action="">
	
	<div class="row">
	<div class="col-md-5">
  <div class="form-group">
    <label for="email">Date Range:</label>
    <input type="date" class="form-control" id="st_dt" value="<?=date('Y-m-01')?>">
  </div>
  </div>
  <div class="col-md-5">
  <div class="form-group">
    <label for="pwd">To:</label>
    <input type="date" class="form-control" id="end_dt" value="<?=date('Y-m-d')?>">
  </div>
  </div>
<div class="col-md-2">
<label for="pwd">&nbsp;</label><br>
  <button type="button" class="btn btn-info show_month">Show</button>
  </div>
  <div class="col-md-12 text-center" style="padding: 10px 0px;">
     <span style="color:red;font-weight: bold;" id="date_err"></span>
  </div>
  </div>
</form>
  </div>
	</div>
	</div>


<?php
    $st_dt = date('Y-m-01');
    $end_dt = date('Y-m-d');
  ?>
	<div class="col-md-12 text-right" style="padding:20px 0px;">
	<a href="<?=base_url()?>sales_tracker/monthly_attendance_report/<?=$st_dt?>/<?=$end_dt?>" class="btn btn-info" id="monthly_attendance"><i class="fa fa-file-text-o" aria-hidden="true"></i> Save as CSV</a>
	

	</div>
  <div class="col-md-12" style="overflow: scroll;
    overflow-y: hidden;">
    <table id="attendance2" class="table table-striped table-bordered" style="width:100%">
      <thead>
      <tr>
      <th><b>Emp Code</b></th>
      <th><b>Emp Name</b></th>
      <th><b>Reporting Head</b></th>
      <?php
      while(strtotime($st_dt)<=strtotime($end_dt))
      {
      ?>
      <th><b><?=date('d M', strtotime($st_dt))?></b></th>
      <?php
      $st_dt = date ("Y-m-d", strtotime("+1 day", strtotime($st_dt)));
      }
      ?>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach($attend as $att)
      {
      ?>
      <tr>
      <td><?=$att['emp_code']?></td>
      <td><?=$att['first_name']?></td>
      <td><?=$att['report_to']?></td>
      <?php
      $st_dt2 = date('Y-m-01');
      $end_dt2 = date('Y-m-d');
      while(strtotime($st_dt2)<=strtotime($end_dt2))
      {
      $at_data = array(
      'emp_code'=>$att['emp_code'],
      'punch_in_date'=>$st_dt2
      );
      $this->db->where($at_data);
      $query = $this->db->get('attendance');
      if($query->num_rows()>0)
      {
      $at_st = "P";
      }
      else
      {
      $at_st = "A";
      }
      ?>
      <td><?=$at_st?></td>
      <?php
      $st_dt2 = date ("Y-m-d", strtotime("+1 day", strtotime($st_dt2)));
      }
      ?>
      </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    </div>
    </div>
		
		<div class="row tx-14" id="tab7">
		<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<h3>Search Form Data</h3>
	
	<form action="">
	<div class="row">
		<div class="col-md-4">
  <div class="form-group">
    <label for="email">&nbsp;</label>
    <select class="form-control" id="member3">
    <option>--Select Member--</option>
    <option value="all">All</option>
    <?php
    foreach ($users_dataa as $row_user)
    {
    ?>
    <option value="<?=$row_user['emp_code']?>"><?=$row_user['first_name'].' '.$row_user['last_name']?></option>
    <?php
    }
    ?>
  </select>
  <span style="color:red;font-weight: bold;" id="v_mem_err"></span>
  </div>
  </div>
  
	
	<div class="col-md-3">
  <div class="form-group">
    <label for="email">Date Range:</label>
    <input type="date" class="form-control" id="v_st_dt" name="v_st_dt" value="<?=date('Y-m-01')?>"/>
  </div>
  </div>
  <div class="col-md-3">
  <div class="form-group">
    <label for="pwd">To:</label>
    <input type="date" class="form-control" id="v_end_dt" name="v_end_dt" value="<?=date('Y-m-d')?>"/>
    <input type="hidden" class="form-control" id="form_id" name="form_id" value=""/>
  </div>
  </div>

<div class="col-md-2">
<label for="visit_show">&nbsp;</label><br>
    <a href="" class="btn btn-info visit_show">show</a>
  </div>
  </div>
</form>
  </div>
	</div>
	</div>



	<div class="col-md-12 text-right" style="padding:20px 0px;">
	<a href="" class="btn btn-info form_data_report"><i class="fa fa-file-text-o" aria-hidden="true"></i> Save as CSV</a>
	</div>

		<table id="forms_elements" class="table table-striped table-bordered" style="width:100%">
    </table>
		
		</div>
		
		<div class="row tx-14" id="tab9">
		9
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
} );
</script>

<script>
$(document).ready(function(){
$('#tab1').addClass('show');
$('#tab2').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');


$('#btn1').click(function(){
$('#tab1').removeClass('hide');
$('#tab2').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');

});

$('#btn2').click(function(){
$('#tab2').removeClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');
});

$('#btn3').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').removeClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');
});

$('#btn4').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').removeClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');
});

$('#btn5').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').removeClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');
});

$('#btn6').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').removeClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');
});

$('.btn7').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').removeClass('hide');
$('#tab8').addClass('hide');
$('#tab9').addClass('hide');
});

$('#btn8').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').removeClass('hide');
$('#tab9').addClass('hide');
});

$('#btn9').click(function(){
$('#tab2').addClass('hide');
$('#tab1').addClass('hide');
$('#tab3').addClass('hide');
$('#tab4').addClass('hide');
$('#tab5').addClass('hide');
$('#tab6').addClass('hide');
$('#tab7').addClass('hide');
$('#tab8').addclass('hide');
$('#tab9').removeClass('hide');
});

});
</script>

  </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$('#visit_details').on('click',function(){
var user_visit=$('#user_visit').val();
var visit_to_date=$('#visit_to_date').val();
var visit_from_date=$('#visit_from_date').val();
$.ajax({
      url:'<?php echo base_url('Sales_tracker/report_user_visit');?>',
      type:'POST',
      data:{user_visit:user_visit,visit_to_date:visit_to_date,visit_from_date:visit_from_date},
      success:function(data)
{
  $('#report_visit_det').html(data);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#exp_details').on('click',function(){
var select_user=$('#select_user').val();
var from_date_exp=$('#from_date_exp').val();
var to_date_exp=$('#to_date_exp').val();
$.ajax({
url:'<?php echo base_url('Sales_tracker/report_user_exp');?>',
type:'POST',
data:{select_user:select_user,from_date_exp:from_date_exp,to_date_exp:to_date_exp},
success:function(data)
{
$('#report_exp_det').html(data);
}
});
});
  });
</script>


<script type="text/javascript">
$(document).ready(function(){
$('#travel_details').on('click',function(){
var select_travel = $('#select_travel').val();
var travel_date = $('#travel_date').val();
$.ajax({
      url:'<?php echo base_url('Sales_tracker/report_travel_userr');?>',
      type:'POST',
      data:{select_travel:select_travel,travel_date:travel_date},
      success:function(data)
      {
        $('#report_travel_det').html(data);
      }
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#attend_show').on('click',function(){
var attend_from = $('#attend_from').val();
var attend_to = $('#attend_to').val();
$.ajax({
      url:'<?php echo base_url('Sales_tracker/attend_user');?>',
      type:'POST',
      data:{attend_from:attend_from,attend_to:attend_to},
      success:function(data)
      {
        $('#report_ateend_det').html(data);
      }
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('.show_mon_travel').click(function(e){
    e.preventDefault();
      var sel = $("#member2")[0].selectedIndex;
      var st_dt = $('#start_travel_dt').val();
      var end_dt = $('#end_travel_dt').val();
      if(sel<=0)
      {
        $('#mem_err2').html('Please select member');
      }
      else
      {
        $('#mem_err2').html('');
        var mem = $("#member2").val();
        $.ajax({
        url:'<?=base_url('sales_tracker/monthly_travel')?>',
        type:'post',
        dataType:'html',
        data :{mem:mem,st_dt:st_dt,end_dt:end_dt},
        success: function(data)
        {
        $('#monthly_travel').html(data);
        var new_url = "<?=base_url()?>sales_tracker/monthly_travel_report/"+mem+"/"+st_dt+"/"+end_dt+"";
        $('.monthly_tra_report').attr("href",new_url);
        console.log(data);
        }
        });
      }
  });
});
</script>



<script type="text/javascript">
  $(document).ready(function(){
    $('.show_month').click(function(){
      var st_dt = $('#st_dt').val();
      var end_dt = $('#end_dt').val();
      var start = new Date(st_dt);
      var end = new Date(end_dt);
      var days = (end.getTime() - start.getTime()) / (1000 * 60 * 60 * 24);
      if((days+1)>31)
      {
        $('#date_err').html('Days range should be 31 or less than 31');
      }
      else
      {
        $('#date_err').html('');
          $.ajax({
        url:'<?=base_url('sales_tracker/monthly_attendance')?>',
        type:'post',
        dataType:'html',
        data:{st_dt:st_dt,end_dt:end_dt},
        success:function(data)
        {
          // alert(data);
          $('#attendance2').html(data);
          var new_url = "<?=base_url()?>sales_tracker/monthly_attendance_report/"+st_dt+"/"+end_dt+"";
          $('#monthly_attendance').attr('href',new_url);
          // console.log(data);
        }
      });
      }
    });
  });
</script>

<!-- form elements -->
<script>
$(document).ready(function(){
  $('.btn7').click(function(){
    var id = $(this).attr('id');
    $.ajax({
      url:'<?=base_url('sales_tracker/forms_elements')?>',
      type:'post',
      dataType:'html',
      data:{id:id},
      success:function(data)
      {
        // console.log(data);
        $('#forms_elements').html(data);
        $('#form_id').val(id);
      }
    });
  });
});
</script>
<!-- form elements end -->

<!-- form data -->
<script>
  $(document).ready(function(){
    $('.visit_show').click(function(e){
      e.preventDefault();
      var sel_st = $('#member3')[0].selectedIndex;
      var st_dt = $('#v_st_dt').val();
      var end_dt = $('#v_end_dt').val();
      var form_id = $('#form_id').val();
      var mem = $('#member3').val();
      if(sel_st<=0)
      {
        $('#v_mem_err').html('Please select member!');
      }
      else
      {
        $('#v_mem_err').html('');
        $.ajax({
          url:'<?=base_url('sales_tracker/form_elem_data2')?>',
          type:'post',
          dataType:'html',
          data:{st_dt:st_dt,end_dt:end_dt,form_id:form_id,mem:mem},
          success:function(data)
          {
            // console.log(data);
            $('#form_el_data').html(data);
            var new_url = "<?=base_url()?>sales_tracker/form_data_report2/"+st_dt+"/"+end_dt+"/"+form_id+"/"+mem+"";
            $('.form_data_report').attr('href',new_url);
          }
        });
      }
    });
  });
</script>
<!-- form data end