    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">


        <div class="row row-xs" style="padding-bottom:30px;">

 <h4 class="mg-b-0 tx-spacing--1">Compliance Status</h4><br><br>
		
<div class="col-md-12">

			<div class="tab">
				<div class="row">
				  <button class="tablinks1 col-md-6" onclick="openCity(event, 'Id1')" id="defaultOpen"><h3>3 / 24</h3>Never Logged In</button>
				  <button class="tablinks1 col-md-6" onclick="openCity(event, 'Id2')"><h3>0 / 24</h3>App Update Required</button>
				  </div>
				</div>
</div>

<div class="col-md-12" style="padding-top:20px;">

				<div id="Id1" class="tabcontent1">
				  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>John</td>
							<td>Doe</td>
							<td>john@example.com</td>
						  </tr>
						  <tr>
							<td>Mary</td>
							<td>Moe</td>
							<td>mary@example.com</td>
						  </tr>
						  <tr>
							<td>July</td>
							<td>Dooley</td>
							<td>july@example.com</td>
						  </tr>
						</tbody>
					  </table>
				</div>

				<div id="Id2" class="tabcontent1">
				  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
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
				  <button class="tablinks1 col-md-3" onclick="openCity(event, 'Id3')" id="defaultOpen">
	<h3>15 / 24</h3>
Not Punched In <br>(Since last 3 days)</button>
				  <button class="tablinks1 col-md-3" onclick="openCity(event, 'Id4')"><h3>4 / 24</h3>
No Visits Added <br> (Since Last 3 days)
</button>
				<button class="tablinks1 col-md-3" onclick="openCity(event, 'Id5')"><h3>9 / 24</h3>
No Forms Fill  <br>(Since Last 3 days)
</button>
				<button class="tablinks1 col-md-3" onclick="openCity(event, 'Id6')"><h3>4 / 24</h3>
Expenses <br> (Since last 3 days)
</button>
				  </div>
				</div>
</div>

<div class="col-md-12" style="padding-top:20px;">

				<div id="Id3" class="tabcontent1">
				  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>John</td>
							<td>Doe</td>
							<td>john@example.com</td>
						  </tr>
						  <tr>
							<td>Mary</td>
							<td>Moe</td>
							<td>mary@example.com</td>
						  </tr>
						  <tr>
							<td>July</td>
							<td>Dooley</td>
							<td>july@example.com</td>
						  </tr>
						</tbody>
					  </table>
				</div>

				<div id="Id4" class="tabcontent1">
				  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
						  </tr>
						</thead>
						<tbody>
					
						</tbody>
					  </table>
				</div>

	<div id="Id5" class="tabcontent1">
				  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
						  </tr>
						</thead>
						<tbody>
					
						</tbody>
					  </table>
				</div>

	<div id="Id6" class="tabcontent1">
				  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
						  </tr>
						</thead>
						<tbody>
					
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
</script>
  </body>
</html>