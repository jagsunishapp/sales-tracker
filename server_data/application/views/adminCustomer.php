

    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="sidebar-nav">
          <li class="nav-label mg-b-15">Recent</li>
          <li class="nav-item"><input type="checkbox"/> Added</li>
			<li class="nav-item"><input type="checkbox"/> MoDified</li>
         
			<br>
			
            <li class="nav-label mg-b-15">Territory</li>
         
			<li class="nav-item"><input type="checkbox"/> Delhi</li>
			<li class="nav-item"><input type="checkbox"/> Unknown</li>
				
			<br>
			<li class="nav-label mg-b-15">Industry</li>
         
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
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Custom Field</button>
	<a href="adm_import_cnt.php" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Import Contacts</a>

<a href="adm_import_cst.php" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Import Customers</a>

<a href="add_customerAdmin.php" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</a>
	

	</div>


			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th>ECustomer Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Industry</th>
                <th>Territory</th>
              
				<th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
              
<td>$320,800</td>
<td><a href="edit_customerAdmin.php" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<a href="#" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
            </tr>
           
        </tbody>
        <tfoot>
            <tr>
                <th>ECustomer Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Industry</th>
                <th>Territory</th>
              
				<th></th>
            </tr>
        </tfoot>
    </table>



 <!-- Add Custom Field -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        
          <h4 class="modal-title">Add Custom Field</h4>
        </div>
        <div class="modal-body" >

		<br>
		<div >
				<table class="table" >
		
				<tbody>

					<tr>
					<td>Select Field Type</td>
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
					<td>Label Name</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
					<tr>
					<td>Placeholder</td>
					<td><input type="text" class="form-control"></td>					
				  </tr>
				
					<tr>
					<td>Mandatory</td>
					<td>
					 <label class="radio-inline">
					  <input type="radio" name="optradio" checked> Yes
					</label>
					<label class="radio-inline">
					  <input type="radio" name="optradio"> No
					</label>
					</td>
					</tr>

					<tr>
					<td>Editable</td>
					<td>
							 <label class="radio-inline">
					  <input type="radio" name="optradio" checked> Yes
					</label>
					<label class="radio-inline">
					  <input type="radio" name="optradio"> No
					</label>
					</td>
					</tr>
					

					
					

					
				
				
				
				</tbody>
			  </table>




		</div>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-info">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
     
        </div><!-- row -->

    
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