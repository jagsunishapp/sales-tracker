    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">


        <div class="row row-xs" style="padding-bottom:30px;">

 <h4 class="mg-b-0 tx-spacing--1">Compliance Status</h4><br><br>
		
<div class="col-md-12">
				<div class="tab">
				<div class="row">
				  <button class="tablinks1 col-md-6 bbc" onclick="openCity(event, 'Id1')" id="defaultOpen" ><h3><?=$to_nvr_lgn?> / <?=$total_users?></h3>Never Logged In</button>
				  <button class="tablinks1 col-md-6 bbc" onclick="openCity(event, 'Id2')"><h3>0 / <?=$total_users?></h3>App Update Required</button>
				  </div>
				</div>
</div>

<div class="col-md-12" style="padding-top:20px;">

				<div id="Id1" class="tabcontent1">
				  <table class="table table-striped" id="example1">
						<thead>
						  <tr>
							<th><b>Name</b></th>
							<th><b>Mobile</b></th>
							<th><b>Added On</b></th>
							<th><b>No. of days</b></th>
						  </tr>
						</thead>
						<tbody>
					<?php
					if($never_login)
					{

					}
					else
					{
						$never_login = array();
					}
					foreach ($never_login as $nl) {
						$join_date = $nl['date'];
						$tod_dt = date('Y-m-d');
						$total_days = (strtotime($tod_dt)-strtotime($join_date))/86400;
					?>
						  <tr>
							<td><?=$nl['first_name']." ".$nl['last_name']?></td>
							<td><?=$nl['mobile_no']?></td>
							<td><?=$nl['date']?></td>
							<td><?=$total_days?></td>
						  </tr>
						  <?php
						  }
						  ?>
						 </tbody>
					  </table>
				</div>

				<div id="Id2" class="tabcontent1">
				  <table class="table table-striped" id="example2">
						<thead>
						  <tr>
							<th><b>Name</b></th>
							<th><b>Mobile</b></th>
							<th><b>Device_OS</b></th>
						  </tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
				</div>
		</div><!-- row -->
      </div><!-- container -->




<div class="row row-xs" style="padding-bottom:30px;">
<h4 class="mg-b-0 tx-spacing--1">Progress Status</h4><br><br>
	<div class="col-md-12">
	<div class="tab">
	<div class="row">

	<button class="tablinks1 col-md-3 bbc" onclick="openCity(event, 'Id3')" id="defaultOpen">
	<h3><?=$tot_not_punched_in?> / <?=$total_users?></h3>Not Punched In <br>(Since last 3 days)
	</button>

	<button class="tablinks1 col-md-3 bbc" onclick="openCity(event, 'Id4')">
	<h3><?=$to_no_visit?> / <?=$total_users?></h3>No Visits Added <br> (Since Last 3 days)
	</button>

	<button class="tablinks1 col-md-3 bbc" onclick="openCity(event, 'Id5')">
	<h3><?=$to_no_forms?> / <?=$total_users?></h3>No Forms Fill  <br>(Since Last 3 days)
	</button>

	<button class="tablinks1 col-md-3 bbc" onclick="openCity(event, 'Id6')">
	<h3><?=$tot_no_expenses?> / <?=$total_users?></h3>Expenses <br> (Since last 3 days)
	</button>

	</div>
	</div>
	</div>

<div class="col-md-12" style="padding-top:20px;">
				<div id="Id3" class="tabcontent1">
				  <table class="table table-striped" id="example3">
						<thead>
						  <tr>
							<th><b>Name</b></th>
							<th><b>Mobile</b></th>
							<th><b>Last Punched-in Date</b></th>
							<th><b>Last Punched-in Since</b></th>
						  </tr>
						</thead>
						<tbody>
							<?php
							if($not_punched_in)
							{

							}
							else
							{
								$not_punched_in = array();
							}
							foreach ($not_punched_in as $no_pu) {
							if($no_pu['days'])
							{
								$days = $no_pu['days']." days";
							}
							else
							{
								$days = "";
							}	
							?>
						  <tr>
							<td><?=$no_pu['first_name'].' '.$no_pu['last_name']?></td>
							<td><?=$no_pu['mobile_no']?></td>
							<td><?=$no_pu['last_punch_in']?></td>
							<td><?=$days?></td>
						  </tr>
						  <?php
						  }
						  ?>
						</tbody>
					  </table>
				</div>

				<div id="Id4" class="tabcontent1">
				  <table class="table table-striped" id="example4">
						<thead>
						  <tr>
							<th><b>Name</b></th>
							<th><b>Mobile</b></th>
							<th><b>Last Visit added Date</b></th>
							<th><b>Last Visit Since</b></th>
						  </tr>
						</thead>
						<tbody>
						<?php
						if($no_visit)
						{

						}
						else
						{
						$no_visit = array();
						}
						foreach ($no_visit as $nv) {
							if($nv['days'])
							{
								$days = $nv['days']." days";
							}
							else
							{
								$days = "";
							}
						?>
						<tr>
							<td><?=$nv['first_name'].' '.$nv['last_name']?></td>
							<td><?=$nv['mobile_no']?></td>
							<td><?=$nv['last_visit_added']?></td>
							<td><?=$days?></td>
						  </tr>
						  <?php
						  }
						  ?>
						</tbody>
					  </table>
				</div>

	<div id="Id5" class="tabcontent1">
				  <table class="table table-striped" id="example5">
						<thead>
						  <tr>
							<th><b>Name</b></th>
							<th><b>Mobile</b></th>
							<th><b>Last Form filled Date</b></th>
							<th><b>Last Form added Since</b></th>
						  </tr>
						</thead>
						<tbody>
						<?php
						if($no_forms)
						{

						}
						else
						{
							$no_forms = array();
						}
						foreach ($no_forms as $nf) {
							if($nf['days'])
							{
								$days = $nf['days']." days";
							}
							else
							{
								$days = "";
							}
						?>
						<tr>
							<td><?=$nf['first_name'].' '.$nf['last_name']?></td>
							<td><?=$nf['mobile_no']?></td>
							<td><?=$nf['last_form_filled']?></td>
							<td><?=$days?></td>
						  </tr>
						  <?php
						  }
						  ?>
						</tbody>
					  </table>
				</div>

				<div id="Id6" class="tabcontent1">
				  <table class="table table-striped" id="example6">
						<thead>
						  <tr>
							<th><b>Name</b></th>
							<th><b>Mobile</b></th>
							<th><b>Last Expense added Date</b></th>
							<th><b>Last Expense added Since</b></th>
						  </tr>
						</thead>
						<tbody>
					<?php
						if($no_expenses)
						{

						}
						else
						{
							$no_expenses = array();
						}
						foreach ($no_expenses as $ne) {
							if($ne['days'])
							{
								$days = $ne['days']." days";
							}
							else
							{
								$days = "";
							}
						?>
						<tr>
							<td><?=$ne['first_name'].' '.$ne['last_name']?></td>
							<td><?=$ne['mobile_no']?></td>
							<td><?=$ne['last_expense_added']?></td>
							<td><?=$days?></td>
						  </tr>
						  <?php
						  }
						  ?>
						</tbody>
					  </table>
				</div> 
        </div><!-- row -->
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

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function(){
$('#example1').DataTable();
});
</script>

<script>
$(document).ready(function(){
$('#example2').DataTable();
});
</script>

<script>
$(document).ready(function(){
$('#example3').DataTable();
});
</script>

<script>
$(document).ready(function(){
$('#example4').DataTable();
});
</script>

<script>
$(document).ready(function(){
$('#example5').DataTable();
});
</script>

<script>
$(document).ready(function(){
$('#example6').DataTable();
});
</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent1");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks1");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
openCity(event, 'Id1');
</script>

</body>
</html>