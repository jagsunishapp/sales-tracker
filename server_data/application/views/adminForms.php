<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="sidebar-nav">
         <li class="nav-label mg-b-15">Master</li>
		 <li class="nav-item"><a href="#" class="btn btn-info" id="btn1"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create From</a></li>
         <li class="nav-item"><a href="#" > Customer Bio Data</a></li>

		<li class="nav-item"><a href="#" > Test</a></li>
		<li class="nav-item"><a href="#">Visiting Form</a></li>
	</ul>
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content content-components">
    	<div class="row tx-14" id="tab1">
			<h2>Form Details</h2>
			<form method="post" action="<?=base_url('Sales_tracker/adminForms')?>">
		<div class="form-group">
			<label for="email">Form name:</label>
			<input type="text" class="form-control" name="form_name" id="form_name">
		 </div>
		 
		 <div class="form-group">
			<label for="active">Active:</label>
			<input type="checkbox" name="active" value="1">
		 </div>
		 
		 <div class="form-group">
			<label for="related_to">Related To:</label>
			 <select class="form-control" id="sel1" name="related_to">
				<option>--Select--</option>
				<option value="Customer">Customer</option>
				<option value="Visit">Visit</option>
				<option value="User">User</option>
			  </select>
		 </div>
		 <div class="form-group">
			<label for="filled">When to be filled by user:</label>
			 <select class="form-control" id="sel1" name="filled">
				<option>--Select--</option>
				<option value="On Demand">On Demand</option>
				<option value="After punch-in">After punch-in</option>
				<option value="After punch-out">After punch-out</option>
			  </select>
		 </div>
		 
		 <div class="form-group">
			<label for="submit_button">Submit Button Caption:</label>
			<input type="text" class="form-control" name="submit_button" id="submit_button">
		 </div>
		 
		 <div class="form-group">
			<label for="mobile_only">Mobile only:</label>
			<input type="checkbox" name="mobile_only" value="1">
		 </div>
		<div class="row" style="padding:10px 0px;">
		<div class="col-md-12 text-right">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus" aria-hidden="true"></i> Add Components</button>
		</div>
		</div>
		<table class="table">
		<thead>
		<tr>
		<th>#</th>
		<th>Label</th>
		<th>Type</th>
		<th>mandatory</th>
		<th></th>
		</tr>
		</thead>
		<tbody id="new_row">
		<tr>
		<td>1</td>
		<td>label</td>
		<td>type</td>
		<td>mandatory</td>
		<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&nbsp;<button type="button" class="btn btn-danger btn-lg"><i class="fa fa-trash-square-o" aria-hidden="true"></i></button></td>
		</tr>
		</tbody>
		</table>
  
		<div class="row" style="padding:20px 0px;">
		<div class="col-md-12">
		<button type="post" class="btn btn-info" name="save">Save</button>
		<button class="btn btn-default">Reset</button>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Preview</button>
		</form>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content preview form-->
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="modal-title">Preview Form</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>

		</div>
		<div class="modal-body">
		<form class="form-horizontal" action="/action_page.php">
		<div class="form-group">
		<label class="control-label col-sm-2" for="email">Email:</label>
		<div class="col-sm-10">
		<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Password:</label>
		<div class="col-sm-10">          
		<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
		</div>
		</div>
		<div class="form-group">        
		<div class="col-sm-offset-2 col-sm-10">
		<div class="checkbox">
		<label><input type="checkbox" name="remember"> Remember me</label>
		</div>
		</div>
		</div>
		<div class="form-group">        
		<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-success">Submit</button>
		</div>
		</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div>
  </div>
  </div>
  </div><!-- row -->

<!-- form elements Data-->
 <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Add Component</h4>
        </div>
        <div class="modal-body">
        	<form method="post" name="form_elements" id="form_elements">
		 <div class="form-group">
			<label for="label">Label:</label>
			<input type="text" class="form-control" id="label" name="label">
		  </div>
		  
		    <div class="form-group">
			<label for="type">Type:</label>
			 <select class="form-control" id="type" name="type">
				<option value="text">Text</option>
				<option value="number">Number</option>
			  </select>
		  </div>
		  
		    <div class="form-group">
			<label for="placeholder">Placeholder:</label>
			<input type="text" class="form-control" id="placeholder" name="placeholder">
		  </div>
		  
		  <div class="form-group">
			<label for="Mandatory">Mandatory</label><br>
			<label class="radio-inline"><input type="radio" name="mandatory" id="mandatory" value="yes" checked> Yes</label>&nbsp;&nbsp;
			<label class="radio-inline"><input type="radio" name="mandatory" id="mandatory" value="no"> No</label>
		  </div>
		  
		  <div class="form-group">
			<label for="">Editable</label><br>
			<label class="radio-inline"><input type="radio" name="editable" id="editable" value="yes" checked> Yes</label>&nbsp;&nbsp;
			<label class="radio-inline"><input type="radio" name="editable" id="editable" value="no"> No</label>
		  </div>
		  
        </div>
        <div class="modal-footer">
		  <button type="submit" class="btn btn-info" name="add">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
      
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
} );
</script>

<script>
$(document).ready(function(){
$('#tab1').addClass('show');

$('#btn1').click(function(){
$('#tab1').removeClass('hide');
});

});
</script>


  </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
$('#form_elements').submit(function(){
var values = [];
var output = '';
$.each($('#form_elements').serializeArray(), function(i, field) {
//values[] = field.value;
values.push(field.value);
//output+='<td>'+field.value+'</td>';
});
for(var i=0;i<values.length-1;i++)
{
	output +='<td>'+values[i]+'<td>';	
}
// console.log(output);
$('#new_row').append(output);
return false;
});
});
</script>