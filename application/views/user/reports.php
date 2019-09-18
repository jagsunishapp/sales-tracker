<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="sidebar-nav">
          <li class="nav-label mg-b-15">REPORTS</li>
        
		<li class="nav-item show">
		<a href="#" class="nav-link" id="btna1">Attendance</a>
		</li>

		<li class="nav-item show">
		<a href="#" class="nav-link " id="btna2">Visit</a>
		</li>

		<li class="nav-item show">
		<a href="#" class="nav-link " id="btna3">Expense</a>
		</li>

		<li class="nav-item show">
		<a href="#" class="nav-link " id="btna4">Travel</a>
		</li>
		  
		  <br>
		  
		   <li class="nav-label mg-b-15">MIS REPORTS</li>

			<li class="nav-item show">
			<a href="#" class="nav-link " id="btna5">Monthly Travel</a>
			</li>

			<!-- <li class="nav-item show">
			<a href="#" class="nav-link " id="btna8">Monthly Attendance</a>
			</li> -->
	
		  		  <br>
		  
		    <li class="nav-label mg-b-15">CUSTOM FORM REPORTS</li>
		   
		   <?php
			foreach($forms as $fm)
			{
			?>
				<li class="nav-item show">
				<a href="#" class="nav-link btna7" id="<?=$fm['forms_id']?>"><?=$fm['form_name']?></a>
				</li>
          <?php
      		}
          ?>
        </ul>
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content content-components" style="padding-top:0px;">
      <div class="container">
		<div id="taba1">
		<br>
		  
		<h2 class="bbc text-center">Attendance</h2>
		<br>
		<div class="card card-body">
		<div class="row ">
		<div class="col-md-4">
		<div class="form-group">
		<label for="email">Members</label>
		<select class="form-control" id="member">
		<option>--Select Member--</option>
		<option value="all">All</option>
		<?php
		foreach($exp_user as $users)
		{
		?>
		<option value="<?=$users['emp_code']?>"><?=$users['first_name'].' '.$users['last_name']?></option>
		<?php
		}
		?>
		</select>
		<span id="mem_err" style="color:red;font-weight: bold;"></span>
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<label for="start_date">Date Range:</label>
		<input type="date" class="form-control" value="<?=date('Y-m-01')?>" id="start_date"/>
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<label for="end_date">&nbsp;</label>
		<input type="date" class="form-control" value="<?=date('Y-m-d')?>" id="end_date"/>
		</div>
		</div>

		<div class="col-md-2">
		<label for="show">&nbsp;</label><br>
		<a href="" class="btn btn-info show_attend">show</a>
		</div>

		</div> 
		</div>
		<div class="row tx-14" style="padding-top:50px;">
			<div class="col-md-12 text-right" style="padding: 10px 0px;">
				<a href="" class="btn btn-info" id="attendance_report">Export to Excel</a>
			</div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		  <thead>
            <tr>
            	<th><b>EMP code</b></th>
            	<th><b>Name</b></th>
                <th><b>Puch in Date</b></th>
                <th><b>Punch in</b></th>
                <th><b>Punch in Location</b></th>
                <th><b>Punch out Date</b></th>
                <th><b>Punch out</b></th>
                <th><b>Punch out Location</b></th>
				<th><b>Time out</b></th>
				<th><b>Worked for</b></th>
            </tr>
        </thead>
        <tbody id="attendance">
            <tr>
            	<td colspan="10">Data not available</td>
            </tr>
        </tbody>
  	</table>
    </div><!-- row -->
		</div>
		<div id="taba2">
		 <br>
		<h2 class="bbc text-center">Search</h2>
		<br>
	 <div class="card card-body">
      <div class="row ">
	  <div class="col-md-4">
	   <div class="form-group">
		<label for="email">User:</label>
		  <select class="form-control" id="user_visit">
			<option>--Select User--</option>
			<?php
            foreach ($exp_user as $user_name) 
            {
            ?>
            <option value="<?php echo $user_name['emp_code'];?>"><?php echo $user_name['first_name'];?> <?php echo $user_name['last_name'];?> (<?php echo $user_name['emp_code'];?>)</option>
            <?php
            }
            ?>
		  </select>
		</div>
	  </div>
	  <div class="col-md-3">
	   <div class="form-group">
		<label>Date Range:</label>
			<input type="date" class="form-control" id="visit_from_date" name="visit_from_date" value="" />
		</div>
	   </div>
	   <div class="col-md-3">
	   <div class="form-group">
		<label>&nbsp;</label>
			<input type="date" class="form-control" id="visit_to_date" name="visit_to_date" value="" />
		</div>
		</div>
		
		<div class="col-md-2">
		<label for="email">&nbsp;</label><br>
		<button type="button" class="btn btn-info" id="visit_details">show</button>
		</div>
	   </div>
	  </div>
	 <div class="row tx-14" style="padding-top:50px;">
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
        </div><!-- row -->
		</div>
		
		<div id="taba3">
		 <br>
		  
		<h2 class="bbc text-center">Search</h2>
		<br>
	<div class="card card-body">
      <div class="row ">
	  <div class="col-md-4">
	   <div class="form-group">
		<label for="email">User:</label>
		  <select class="form-control" id="select_user">
		  	<option>--Select User--</option>
			<?php
            foreach ($exp_user as $user_name) 
           {
           ?>
            <option value="<?php echo $user_name['emp_code'];?>"><?php echo $user_name['first_name'];?> <?php echo $user_name['last_name'];?> (<?php echo $user_name['emp_code'];?>)</option>
                <?php
            }
            ?>
		</select>
		</div>
	  </div>
	  
	   <div class="col-md-3">
	   <div class="form-group">
		<label for="email">Date Range</label>
			<input type="date" class="form-control" id="from_date_exp"/>
		</div>
	   </div>
	   <div class="col-md-3">
	   <div class="form-group">
		<label for="email">&nbsp;</label>
		<input type="date" class="form-control" id="to_date_exp"/>
		</div>
		</div>
		<div class="col-md-2">
		<label for="email">&nbsp;</label><br>
		<button class="btn btn-info" id="exp_details" class="exp_details">show</button>
		</div>
	   </div>
	  </div>
	 <div class="row tx-14" style="padding-top:50px;">
		<table id="example3" class="table table-striped table-bordered" style="width:100%">
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
            </tr>
        </thead>
        <tbody id='report_exp_det'>
        
        </tbody> 
		 </table>
        
        </div><!-- row -->
		</div>
	<div id="taba4">
<br>
<h2 class="bbc text-center">Search</h2>
		<br>
		<div class="card card-body">
      <div class="row ">
	  <div class="col-md-4">
	   <div class="form-group">
		<label for="email">User:</label>
		  <select class="form-control" id="travel_user">
		  	<option>--Select User--</option>
			<?php
            foreach ($exp_user as $user_name) 
           {
           ?>
            <option value="<?php echo $user_name['emp_code'];?>"><?php echo $user_name['first_name'];?> <?php echo $user_name['last_name'];?> (<?php echo $user_name['emp_code'];?>)</option>
                <?php
            }
            ?>
		  </select>
		</div>
	  </div>
	  <div class="col-md-3">
	   <div class="form-group">
		<label for="email">Date Range:</label>
			<input type="date" class="form-control" id="from_travel_date" name="from_travel_date" />
		</div>
	   </div>
	    <div class="col-md-3">
	   <div class="form-group">
		<label for="email">&nbsp;</label>
			<input type="date" class="form-control" id="to_travel_date" name="to_travel_date" />
		</div>
		</div>
		
		<div class="col-md-2">
		<label for="email">&nbsp;</label><br>
		<button type="button" class="btn btn-info" id="travel_details">show</button>
		</div>
	   </div>
	  </div>
	 <div class="row tx-14" style="padding-top:50px;">
		<table id="example4" class="table table-striped table-bordered" style="width:100%">
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
        <tbody id="travel_data"> 
        </tbody>
        </table>
        </div><!-- row -->
		</div>
		
		
		<div id="taba5">
		 <br>
		  
		<h2 class="bbc text-center">Monthly Travel</h2>
		<br>
		<div class="card card-body">
		<div class="row">
	  <div class="col-md-4">
	   <div class="form-group">
		<label for="member2">Members :</label>
		  <select class="form-control" id="member2">
		  	<option>--Select Member--</option>
			<option value="all">All</option>
			<?php
			foreach($exp_user as $users)
			{
			?>
			<option value="<?=$users['emp_code']?>"><?=$users['first_name'].' '.$users['last_name']?></option>
			<?php
			}
			?>
		  </select>
		  <span id="mem_err2" style="color:red;font-weight: bold;"></span>
		</div>
	  </div>
	  
	   <div class="col-md-3">
	   <div class="form-group">
		<label for="start_travel_dt">Date Range:</label>
			<input type="date" class="form-control" name="start_travel_dt" id="start_travel_dt" value="<?=date('Y-m-01')?>"/>
		</div>
	   
	   </div>
	   
	      <div class="col-md-3">
	   <div class="form-group">
		<label for="end_travel_dt">To</label>
			<input type="date" class="form-control" name="end_travel_dt" id="end_travel_dt" value="<?=date('Y-m-d')?>"/>
		</div>
		</div>
		
		<div class="col-md-2">
		<label for="show">&nbsp;</label><br>
		<a href="" class="btn btn-info show_mon_travel">show</a>
		</div>
	   
	   </div>
	  </div>
	 
        <div class="row tx-14" style="padding-top:50px;">
		<div class="col-md-12 text-right" style="padding: 10px 0px;">
				<a href="" class="btn btn-info monthly_tra_report">Export to Excel</a>
			</div>

		 <table id="example5" class="table table-striped table-bordered" style="width:100%">
		  <thead>
            <tr>
                <th><b>User</b></th>
                <th><b>Total Distance Travelled (In Kms)</b></th>
                <th><b>Total Visits</b></th>
			</thead>
        <tbody id="monthly_travel">
            <tr>
            	<td colspan="3">Data not available</td>
            </tr>
        </tbody>
  		</table>
        </div><!-- row -->
		</div>
		
	<div id="taba7">
		 <br>
		  
		<h2 class="bbc text-center">Forms Data</h2>
		<br>
		<div class="card card-body">
	 <div class="row ">
	  <div class="col-md-4">
	   <div class="form-group">
		<label for="email">Member:</label>
		  <select class="form-control" id="member3">
			<option>--Select Member--</option>
		<option value="all">All</option>
		<?php
		foreach($exp_user as $users)
		{
		?>
		<option value="<?=$users['emp_code']?>"><?=$users['first_name'].' '.$users['last_name']?></option>
		<?php
		}
		?>
		  </select>
		  <span style="color:red;font-weight: bold;" id="v_mem_err"></span>
		</div>
	  </div>
	  
	   <div class="col-md-3">
	   <div class="form-group">
		<label for="v_st_dt">Date Range:</label>
			<input type="date" class="form-control" id="v_st_dt" name="v_st_dt" value="<?=date('Y-m-01')?>"/>
		</div>
	   </div>
	   
		<div class="col-md-3">
		<div class="form-group">
		<label for="v_end_dt">&nbsp;</label>
		<input type="date" class="form-control" id="v_end_dt" name="v_end_dt" value="<?=date('Y-m-d')?>"/>
		<input type="hidden" class="form-control" id="form_id" name="form_id" value=""/>
		</div>
		</div>
		
		<div class="col-md-2">
		<label for="visit_show">&nbsp;</label><br>
		<a href="" class="btn btn-info visit_show">show</a>
		</div>
	   </div>
	  </div>
	 
	  <div class="row tx-14" style="padding-top:50px;">	
		<div class="col-md-12 text-right" style="padding: 10px 0px;">
		<a href="" class="btn btn-info form_data_report">Export to Excel</a>
		</div>

		<table id="forms_elements" class="table table-striped table-bordered" style="width:100%">
			
		</table>
        </div><!-- row -->
		</div>
		
		<div id="taba8">
		 <br>
		  
		<h2 class="bbc text-center">Monthly Attendance</h2>
		<br>
	<div class="card card-body">
	<div class="row">  
	   <div class="col-md-5">
	   <div class="form-group">
		<label for="email">Date Range:</label>
		<input type="date" class="form-control" id="st_dt" value="<?=date('Y-m-01')?>"/>
		</div>
	   </div>
	   
	   <div class="col-md-5">
	   <div class="form-group">
		<label for="email">&nbsp;</label>
			<input type="date" class="form-control" id="end_dt" value="<?=date('Y-m-d')?>"/>
		</div>
		</div>
		
		<div class="col-md-2">
		<label for="email">&nbsp;</label><br>
		<a class="btn btn-info show_month">show</a>
		</div>
		<div class="col-md-12 text-center" style="padding: 10px 0px;">
		<span style="color:red;font-weight: bold;" id="date_err"></span>
		</div>
	</div>
	</div>
	<?php
		$st_dt = date('Y-m-01');
		$end_dt = date('Y-m-d');
	?>
        <div class="row tx-14" style="padding-top:50px;">
		<div class="col-md-12 text-right" style="padding: 10px 0px;">
		<a href="<?=base_url()?>sales_tracker/monthly_attendance_report/<?=$st_dt?>/<?=$end_dt?>" class="btn btn-info" id="monthly_attendance">Export to Excel</a>
		</div>
	<div class="col-md-12" style="overflow: scroll;
    overflow-y: hidden;">
	<table class="table table-striped table-bordered" id="attendance2" style="width:100%">
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
        </div><!-- row -->
		</div>
	</div><!-- container -->
    </div><!-- content -->

    <script src="<?=base_url()?>user/lib/jquery/jquery.min.js"></script>
		
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
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
	$(document).ready(function() {
    $('#example6').DataTable();
		});
	</script>
	
	<script>
	$(document).ready(function() {
    $('#example7').DataTable();
		});
	</script>
	
	
    <script>
      $(function(){
        'use strict'
      });
    </script>
	
	
<script>
$(document).ready(function(){
$('#taba2').addClass('hide');
$('#taba3').addClass('hide');
$('#taba4').addClass('hide');
$('#taba5').addClass('hide');
$('#taba6').addClass('hide');
$('#taba7').addClass('hide');
$('#taba8').addClass('hide');

$('#btna1').click(function(){
$('#taba1').removeClass('hide');
$('#taba2').addClass('hide');
$('#taba3').addClass('hide');
$('#taba4').addClass('hide');
$('#taba5').addClass('hide');
$('#taba6').addClass('hide');
$('#taba7').addClass('hide');
$('#taba8').addClass('hide');
});

$('#btna2').click(function(){
$('#taba1').addClass('hide');
$('#taba2').removeClass('hide');
$('#taba3').addClass('hide');
$('#taba4').addClass('hide');
$('#taba5').addClass('hide');
$('#taba6').addClass('hide');
$('#taba7').addClass('hide');
$('#taba8').addClass('hide');
});

$('#btna3').click(function(){
$('#taba1').addClass('hide');
$('#taba2').addClass('hide');
$('#taba3').removeClass('hide');
$('#taba4').addClass('hide');
$('#taba5').addClass('hide');
$('#taba6').addClass('hide');
$('#taba7').addClass('hide');
$('#taba8').addClass('hide');
});

$('#btna4').click(function(){
$('#taba1').addClass('hide');
$('#taba2').addClass('hide');
$('#taba3').addClass('hide');
$('#taba4').removeClass('hide');
$('#taba5').addClass('hide');
$('#taba6').addClass('hide');
$('#taba7').addClass('hide');
$('#taba8').addClass('hide');
});

$('#btna5').click(function(){
$('#taba1').addClass('hide');
$('#taba2').addClass('hide');
$('#taba3').addClass('hide');
$('#taba4').addClass('hide');
$('#taba5').removeClass('hide');
$('#taba6').addClass('hide');
$('#taba7').addClass('hide');
$('#taba8').addClass('hide');
});

$('#btna6').click(function(){
$('#taba1').addClass('hide');
$('#taba2').addClass('hide');
$('#taba3').addClass('hide');
$('#taba4').addClass('hide');
$('#taba5').addClass('hide');
$('#taba6').removeClass('hide');
$('#taba7').addClass('hide');
$('#taba8').addClass('hide');
});

$('.btna7').click(function(){
$('#taba1').addClass('hide');
$('#taba2').addClass('hide');
$('#taba3').addClass('hide');
$('#taba4').addClass('hide');
$('#taba5').addClass('hide');
$('#taba6').addClass('hide');
$('#taba7').removeClass('hide');
$('#taba8').addClass('hide');
});


$('#btna8').click(function(){
$('#taba1').addClass('hide');
$('#taba2').addClass('hide');
$('#taba3').addClass('hide');
$('#taba4').addClass('hide');
$('#taba5').addClass('hide');
$('#taba6').addClass('hide');
$('#taba7').addClass('hide');
$('#taba8').removeClass('hide');
});

});
</script>

</body>
</html>

<!-- attendance search -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.show_attend').click(function(e) {
			e.preventDefault();
			var sel = $("#member")[0].selectedIndex;
			var st_dt = $('#start_date').val();
			var end_dt = $('#end_date').val();
			if(sel<=0)
			{
				$('#mem_err').html('Please select member');
			}
			else
			{
				$('#mem_err').html('');
				var mem = $("#member").val();
				$.ajax({
					url:'<?=base_url('sales_tracker/attendance')?>',
					type:'post',
					dataType:'html',
					data :{mem:mem,st_dt:st_dt,end_dt:end_dt},
					success: function(data)
					{
						$('#attendance').html(data);
						var new_url = "<?=base_url()?>sales_tracker/attendance_report/"+mem+"/"+st_dt+"/"+end_dt+"";
						$('#attendance_report').attr("href",new_url);
						//alert(data);
					}
				});
			}
		});
	});
</script>
<!-- attendance search end -->

<!-- monthly attendance search -->
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
<!-- monthly attendance search end -->

<!-- monthly travel -->
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
<!-- monthly travel end -->

<!-- form elements -->
<script>
$(document).ready(function(){
	$('.btna7').click(function(){
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
					url:'<?=base_url('sales_tracker/form_elem_data')?>',
					type:'post',
					dataType:'html',
					data:{st_dt:st_dt,end_dt:end_dt,form_id:form_id,mem:mem},
					success:function(data)
					{
						// console.log(data);
						$('#form_el_data').html(data);
						var new_url = "<?=base_url()?>sales_tracker/form_data_report/"+st_dt+"/"+end_dt+"/"+form_id+"/"+mem+"";
						$('.form_data_report').attr('href',new_url);
					}
				});
			}
		});
	});
</script>
<!-- form data end -->

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
	if(data) 
	{
		$('#report_visit_det').html(data);
	}
	else
	{
  		$('#report_visit_det').html("No data available in table");
	}
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#travel_details').on('click',function(){
var travel_user=$('#travel_user').val();
var from_travel_date=$('#from_travel_date').val();
var to_travel_date=$('#to_travel_date').val();
$.ajax({
      url:'<?php echo base_url('Sales_tracker/report_user_travel');?>',
      type:'POST',
      data:{travel_user:travel_user,from_travel_date:from_travel_date,to_travel_date:to_travel_date},
      success:function(data)
		{
			$('#travel_data').html(data);
		}
});
});
});
</script>