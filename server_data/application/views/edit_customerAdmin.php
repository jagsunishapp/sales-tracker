

    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row row-xs" style="padding-bottom:30px;">
	
		<div class="col-md-8 offset-md-2" style="padding:10px 0px;">
			<button class="btn btn-info" id="btn1">Profile</button>
			<button class="btn btn-info" id="btn2">Custom Fields</button>
		</div>
		
		<div class="col-md-8 offset-md-2" id="tab1">
		<div class="card">
			<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Customer Name:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Territory:</label>
							  <select class="form-control" id="sel1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							  </select>
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Customer Print AS:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Customer Print AS:</label><br>
						<input type="checkbox" class="form-control"/>
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Location Identifier:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Industry:</label>
						  <select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					  </div>
				</div>

				<div class="col-md-12">
					 <div class="form-group">
						<label for="email">Address:</label>
						<textarea class="form-control" rows="3" id="comment"></textarea>
					  </div>
				</div>

				<div class="col-md-12">
							<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.enable-javascript.net">lubage</a></div><style>.mapouter{position:relative;text-align:right;height:200px;width:100%px;}.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:100%px;}</style></div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Latitude, Longitude:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>
				
				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Phone:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Phone2:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Phone3:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Fax1:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Fax2:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Email1:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Email2:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Email3:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Website:</label>
						<input type="email" class="form-control" id="email">
					  </div>
				</div>
			
				<div class="col-md-12">
				<button class="btn btn-info">Save</button>
					<button class="btn btn-default">Canel</button>
				</div>




			</div>
			</div>
		</div>
		</div>

		<div class="col-md-8 offset-md-2" id="tab2">
		<div class="card">
			<div class="card-body">
			<div class="row">
				
			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Test:</label>
					<input type="email" class="form-control" id="email">
				 </div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Customer Name:</label>
					<input type="email" class="form-control" id="email">
				 </div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Detail:</label>
					<input type="email" class="form-control" id="email">
				 </div>
			</div>

				<div class="col-md-12">
				<button class="btn btn-info">Save</button>
					<button class="btn btn-default">Reset</button>
				</div>

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





  </body>

</html>

<script>
$(document).ready(function(){
$('#tab1').addClass('show');
$('#tab2').addClass('hide');
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
