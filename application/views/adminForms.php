<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
	<ul class="sidebar-nav">
	<li class="nav-label mg-b-15">Forms</li>
	<li class="nav-item"><a href="" class="btn btn-info" id="btn1"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create From</a></li>
	<?php
	foreach($forms as $fm)
	{
		?>
		<li class="nav-item"><a href="" id="<?=$fm['forms_id']?>" class="forms_name"><?=$fm['form_name']?></a></li>
	<?php
	}
	?>
	<!-- <li class="nav-item"><a href="#" class="btn btn-info" id="btn1"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create From</a></li>
	<li class="nav-item"><a href="#" > Customer Bio Data</a></li>
	<li class="nav-item"><a href="#" > Test</a></li>
	<li class="nav-item"><a href="#">Visiting Form</a></li> -->
	</ul>
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content content-components">
    	<span style="color:green;font-weight: bold;font-size: 15px;"><?=$this->session->flashdata('form_sucs')?></span>
			<span style="color:red;font-weight: bold;font-size: 15px;"><?=$this->session->flashdata('form_err')?></span>
    	<div class="row tx-14" id="tab1">
			<h2>Form Details</h2>
			<form method="post" action="<?=base_url('Sales_tracker/adminForms')?>" id="dynamic_form">
		<div class="form-group">
			<label for="email">Form name:</label>
			<input type="text" class="form-control" name="form_name" id="form_name">
			<span style="font-weight: bold;color:red;"><?=form_error('form_name')?></span>
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
			<span style="font-weight: bold;color:red;"><?=form_error('submit_button')?></span>
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
		<span style="font-weight: bold;color:red;"><?=form_error('label[]')?></span>
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
		<!-- <tr>
		<td>1</td>
		<td>label</td>
		<td>type</td>
		<td>mandatory</td>
		<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&nbsp;<button type="button" class="btn btn-danger btn-lg"><i class="fa fa-trash-square-o" aria-hidden="true"></i></button></td>
		</tr> -->
		</tbody>
		</table>
  
		<div class="row" style="padding:20px 0px;">
		<div class="col-md-12">
		<button type="submit" class="btn btn-info" name="save">Save</button>
		<button class="btn btn-default">Reset</button>
		<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Preview</button> -->
		</form>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content preview form-->
		<div class="modal-content">
		<div class="modal-header">
		<!-- <h4 class="modal-title">Preview Form</h4> -->
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
				<option value="button">Button</option>
				<option value="date">Date</option>
				<option value="email">Email</option>
				<option value="password">Password</option>
				<option value="file">File</option>
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
		  <button type="button" class="btn btn-info add" name="add">Add</button>
		  <button type="button" class="btn btn-info hide update" name="add">Update</button>
          <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
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
$('.add').click(function(){
var values = [];
var rowCount = $('#new_row tr').length;
var new_rowCount = rowCount+1;
var output = '<tr><td>'+new_rowCount+'</td>';
$.each($('#form_elements').serializeArray(), function(i, field) {
// values[field.key] = field.value;
values.push(field.value);
//output+='<td>'+field.value+'</td>';
});
// for(var i=0;i<values.length;i++)
// {
	output +='<td><input type="text" value="'+values[0]+'" name="label[]" readonly style="border:none;"></td>';
	output +='<td><input type="text" value="'+values[1]+'" name="type[]" readonly style="border:none;"></td>';
	output +='<td><input type="text" value="'+values[3]+'" name="mandatory[]" readonly style="border:none;"></td>';
	output +='<td style="display:none;"><input type="text" value="'+values[2]+'" name="placeholder[]" readonly style="border:none;"></td>';
	output +='<td style="display:none;"><input type="text" value="'+values[4]+'" name="editable[]" readonly style="border:none;"></td>';	
// }
output +='</td><td><button type="button" class="btn btn-danger btn-lg" id="dlt"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
// console.log(output);
$('#new_row').append(output);
// $('#myModal2').modal('hide');
$('#close').click();
$('#myModal2').find('#form_elements').trigger('reset');
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('.update').click(function(){
var values = [];
var rowCount = $('#new_row tr').length;
var new_rowCount = rowCount+1;
var output = '<tr><td>'+new_rowCount+'</td>';
$.each($('#form_elements').serializeArray(), function(i, field) {
//values[] = field.value;
values.push(field.value);
//output+='<td>'+field.value+'</td>';
});
for(var i=0;i<values.length-1;i++)
{
	output +='<td>'+values[i]+'</td>';	
}
output +='</td><td><button type="button" class="btn btn-danger btn-lg" id="dlt"><i class="fa fa-trash-square-o" aria-hidden="true"></i></button></td></tr>';
// console.log(output);
$('#new_row').append(output);
// $('#myModal2').modal('hide');
$('#close').click();
$('#myModal2').find('#form_elements').trigger('reset');
});
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tab1').on('click','#new_row #dlt',function(){
			// alert('hello');
			$(this).closest('tr').remove();
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#new_row').on('click','#edt',function(){
			$('.update').removeClass('hide');
			$('.add').addClass('hide');
		currentRow = $(this).closest('tr');
		currentRowCells = currentRow.children();

		//Now can access any cell within current row using currentRowCells Object, as follow
		var firstCell = currentRowCells.eq(1).text();
		var secondCell = currentRowCells.eq(2).text();
		var thirdCell = currentRowCells.eq(3).text();
		var fourthCell = currentRowCells.eq(4).text();

		$('#label').val(firstCell);
		$('#type').val(secondCell);
		$('#placeholder').val(thirdCell);
		console.log(firstCell+' '+secondCell+' '+thirdCell+' '+fourthCell);
		});
	});
</script>

<script type="text/javascript">
	$('.forms_name').on('click',function(e){
		e.preventDefault();
		var form_id = $(this).attr('id');
		$.ajax({
			url:'<?=base_url('sales_tracker/form_data')?>',
			type:'post',
			dataType:'html',
			data:{form_id:form_id},
			success:function(data)
			{
				// console.log(data);
				$('#dynamic_form').html(data);
			}
		});
	});
</script>