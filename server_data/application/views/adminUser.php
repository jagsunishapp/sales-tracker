<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="sidebar-nav">
          <li class="nav-label mg-b-15">Status</li>
          <li class="nav-item"><input type="checkbox"/> Actice</li>
			<li class="nav-item"><input type="checkbox"/> Inactive</li>
         
			<br>
			
            <li class="nav-label mg-b-15">Territory</li>
         
			<li class="nav-item"><input type="checkbox"/> Delhi</li>
			<li class="nav-item"><input type="checkbox"/> Unknown</li>

			<br>
			<br>
			<button class="btn btn-info">Clear Filters</button>
          
         
         
        </ul>
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content content-components">
   
   

 
        <div class="row tx-14">

	<div class="col-md-12 text-right" style="padding-bottom:20px;">
	<a href="adminImportUser.php" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Import users</a>
	
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Users</button>
	</div>


			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Emp. Code</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Active</th>
                <th>Attendance Status</th>
				<th>DateTime</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
			<td>Tiger Nixon</td>
			<td>System Architect</td>
			<td>Edinburgh</td>
			<td>61</td>
			<td><input type="checkbox"/></td>
			<td>$320,800</td>
			<td>$320,800</td>
			<td>$320,800</td>
            </tr>
           
        </tbody>
        <tfoot>
            <tr>
                <th>Emp. Code</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Active</th>
                <th>Attendance Status</th>
				<th>DateTime</th>
				<th></th>
            </tr>
        </tfoot>
    </table>



 <!-- Add User Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        
          <h4 class="modal-title">Add User Details</h4>
        </div>
        <div class="modal-body" >
	<div style="paddin-bottom:10px;">
		<button class="btn btn-info" id="btn1">General Info</button>
		<button class="btn btn-info" id="btn2">Territories</button>
	</div>
		<br>
		<div style="height: 350px;overflow: scroll;overflow-x: hidden;">
				<table class="table" id="tab1">
		
				<tbody>
				  <tr>
					<td>First Name</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Last Name</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Emp. Code</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Designation</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Role</td>
					<td>
						  <select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					</td>					
				  </tr>
					<tr>
					<td>Reports To</td>
					<td>
					  <select class="form-control" id="sel1">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					  </select>

					</td>					
				  </tr>

					<tr>
					<td>Office Location</td>
					<td>
						  <select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>

					</td>					
				  </tr>
					<tr>
					<td>Email</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Password</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Confirm Password</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Mobile No.</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>

					<tr>
					<td>Accuracy (In Meters)</td>
					<td>
						  <select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					</td>					
				  </tr>

					<tr>
					<td>Check-In Radius (In Meters)</td>
					<td>
						  <select class="form-control" id="sel1">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					  </select>
					</td>					
				  </tr>
					
					<tr>
					<td>Active</td>
					<td><input type="checkbox" ></td>					
				  </tr>

					<tr>
					<td>Allow Timeout</td>
					<td><input type="checkbox" ></td>					
				  </tr>
				
					<tr>
					<td>Allow Offline</td>
					<td><input type="checkbox" ></td>					
				  </tr>
				
				
				
				</tbody>
			  </table>


			<table class="table hide" id="tab2">
				<tr>
					<td>Category Name</td>
					<td></td>
				</tr>
				<tr>
					<td>Unknown</td>
					<td><input type="checkbox"></td>
				</tr>
				<tr>
					<td>Delhi</td>
					<td><input type="checkbox"></td>
				</tr>

			</table>


		</div>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-info">Continue</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
     
        </div><!-- row -->
<!-- footer -->

    
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