

    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
      <div class="sidebar-header">
        <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Components</h5>
        <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="sidebar-nav">
    <li class="nav-label mg-b-15">Recent</li>
    <li class="nav-item"><input type="checkbox" name="chk" class="chck" value="1" id="Recent"/> Added</li>
    <li class="nav-item"><input type="checkbox" name="chk" class="chck"value="2" id="Recent"/> MoDified</li>

    <br>

    <li class="nav-label mg-b-15">Territory</li>
    <li class="nav-item"><input type="checkbox" name="chk" class="chck" value="Unknown" id="Territory"/> Unknown</li>
    <?php
    foreach($territory_data as $terr)
    {
      ?>
      <li class="nav-item"><input type="checkbox" name="chk" class="chck" value="<?=$terr['territory_name']?>" id="Territory"/> <?=$terr['territory_name']?></li> 
    <?php
    }
    ?>
    <!-- <li class="nav-item"><input type="checkbox" name="chk" class="chck" value="delhi" id="Territory"/> Delhi</li>
    <li class="nav-item"><input type="checkbox" name="chk" class="chck" value="Unknown" id="Territory"/> Unknown</li> -->

    <br>
    <li class="nav-label mg-b-15">Industry</li>

    <li class="nav-item"><input type="checkbox" name="chk" class="chck" value="Unknown" id="Industry"/> Unknown</li>
    <?php
    foreach($industry_data as $ind)
    {
    ?>
    <li class="nav-item"><input type="checkbox" name="chk" class="chck" value="<?=$ind['industry_name']?>" id="Industry"/> <?=$ind['industry_name']?></li>
    <?php
    }
    ?>

      <br>
      <br>
      <a href="" class="btn btn-info">Clear Filters</a>
          
         
         
        </ul>
      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content content-components">
   
   

 
        <div class="row tx-14">

  <div class="col-md-12 text-right" style="padding-bottom:20px;">
<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Custom Field</button>
  <a href="adm_import_cnt.php" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Import Contacts</a> -->
<!-- <a href="adm_import_cst" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Import Customers</a> -->

<a href="add-customers" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</a>
  

  </div>

<span style="color:#0bb50b;font-weight: bold;font-size: 15px;">
  <?=$this->session->flashdata('dlt_cust_sucs')?></span>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th>Customer Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Industry</th>
                <th>Territory</th>
        <th>Action</th>
            </tr>
        </thead>
        <tbody id="filtered_data">
        <?php
        foreach($customers as $cust)
        {
        ?>
    <tr>
    <td><?=$cust['customer_name']?></td>
    <td><?=$cust['phone1']?></td>
    <td><?=$cust['email']?></td>
    <td><?=$cust['industry']?></td>
    <td><?=$cust['territory']?></td>
    <td><a href="<?=base_url()?>sales_tracker/edit_customer/<?=$cust['customer_id']?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <a href="<?=base_url()?>sales_tracker/dlt_customer/<?=$cust['customer_id']?>" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </td>
    </tr>
        <?php
         }
        ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Customer Name</th>
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
        <div class="modal-body">
    <br>
    <div>
        <table class="table">
    
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

    <script src="<?=base_url()?>user/lib/jquery/jquery.min.js"></script>
    <!-- <script src="<?=base_url()?>user/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>user/lib/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>user/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="<?=base_url()?>user/assets/js/dashforge.js"></script> -->
	
		
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
		} );
	
	</script>
	
    <script>
      $(function(){
        'use strict'

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
var filters = [];
// var obj = [];
// var obj={};
$('.chck').change(function(){
  var obj = {};
  obj['Recent'] = "";
  obj['Territory'] = "";
  obj['Industry'] = "";
  var obj2 = [];
  var obj3 = [];
  var obj4 = [];
  $('input:checkbox[name=chk]:checked').each(function() 
  {
    if($(this).attr('id')=='Recent')
    {
      obj2.push($(this).val());
      obj['Recent'] = obj2;
    }
    if($(this).attr('id')=='Territory')
    {
      obj3.push($(this).val());
      obj['Territory'] = obj3;
    }
    if($(this).attr('id')=='Industry')
    {
      obj4.push($(this).val());
      obj['Industry'] = obj4;
    }
    // if(jQuery.inArray($(this).val(), filters)=='-1')
    // {
    //  //obj[$(this).attr('id')] = $(this).val();
    //  filters.push($(this).val());
    //  // filters.push(obj);
    // }
  });
  var fil = obj;
  // console.log(obj);
  $.ajax({
    url:'<?=base_url('sales_tracker/filter_customer')?>',
    type:'post',
    dataType : 'html',
    data :{fil:fil},
    success:function(data)
    {
      $('#filtered_data').html(data);
    }
  });
});
</script>