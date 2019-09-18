<div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row row-xs" style="padding-bottom:30px;">
	
		<div class="col-md-8 offset-md-2" style="padding:10px 0px;">
			<button class="btn btn-info" id="btn1">Profile</button>
			<!-- <button class="btn btn-info" id="btn2">Custom Fields</button> -->
		</div>
		
		<div class="col-md-8 offset-md-2" id="tab1">
		<div class="card">
			<div class="card-body">
			<span style="color:#1eb31e;font-weight: bold;"><?=$this->session->flashdata('cust_sucs')?></span>
			<span style="color:red;font-weight: bold;"><?=$this->session->flashdata('cust_err')?></span>
			<form method="post" action="<?=base_url('sales_tracker/add_customer')?>">
			<div class="row">
				<div class="col-md-6">
					 <div class="form-group">
						<label for="name">Customer Name:</label>
						<input type="text" class="form-control" name="name" id="name">
						<span style="color:red;font-weight: bold;"><?=form_error('name')?></span>
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="Territory">Territory:</label>
							  <select class="form-control" id="sel1" name="territory">
							  	<option value="unknown">Unknown</option>
							  	<?php
							  	foreach($territory_data as $terr)
							  	{
							  	?>
								<option value="<?=$terr['territory_name']?>"><?=$terr['territory_name']?></option>
								<?php
								}
								?>
							  </select>
							  <span style="color:red;font-weight: bold;"><?=form_error('territory')?></span>
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="print_as">Customer Print AS:</label>
						<input type="text" class="form-control" name="print_as" id="print_as">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="head_office">Is Head Office:</label><br>
						<input type="checkbox" class="form-control" value="yes" id="head_office" name="head_office"/>
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="loc_ident">Location Identifier:</label>
						<input type="text" class="form-control" id="loc_ident" name="loc_ident">
						<span style="color:red;font-weight: bold;"><?=form_error('loc_ident')?></span>
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="industry">Industry:</label>
						  <select class="form-control" id="sel1" name="industry">
						  	<option value="unknown">Unknown</option>
						  	<?php
						  	foreach($industry_data as $ind)
						  	{
						  	?>
							<option value="<?=$ind['industry_name']?>"><?=$ind['industry_name']?></option>
							<?php
							}
							?>
						  </select>
						  <span style="color:red;font-weight: bold;"><?=form_error('industry')?></span>
					  </div>
				</div>

				<div class="col-md-12">
					 <div class="form-group">
						<label for="address">Address:</label>
						<textarea class="form-control" rows="3" id="address" name="address"></textarea>
						<span style="color:red;font-weight: bold;"><?=form_error('address')?></span>
					  </div>
				</div>

				<div class="col-md-12" style="padding-bottom: 10px;">
					<!-- <div id="map"></div> -->
					<div id="map_canvas" style="width:100%; height:200px;"></div>
				<!-- <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=new delhi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.enable-javascript.net">lubage</a></div><style>.mapouter{position:relative;text-align:right;height:200px;width:100%px;}.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:100%px;}</style></div> -->
				</div>
				<div class="col-md-3">
					 <div class="form-group">
						<label for="lat_long">Latitude :</label>
						<input type="text" class="form-control" id="latbox" name="lat">
					  </div>
				</div>
				<div class="col-md-3">
					 <div class="form-group">
						<label for="lat_long">Longitude :</label>
						<input type="text" class="form-control" id="lngbox" name="long">
					  </div>
				</div>
				
				<div class="col-md-6">
					 <div class="form-group">
						<label for="phone">Phone:</label>
						<input type="number" class="form-control" id="phone" name="phone">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="phone2">Phone2:</label>
						<input type="number" class="form-control" id="phone2" name="phone2">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="phone3">Phone3:</label>
						<input type="number" class="form-control" id="phone3" name="phone3">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="fax">Fax1:</label>
						<input type="text" class="form-control" id="fax" name="fax">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="fax2">Fax2:</label>
						<input type="text" class="form-control" id="fax2" name="fax2">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email">Email1:</label>
						<input type="email" class="form-control" id="email" name="email">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email2">Email2:</label>
						<input type="email" class="form-control" id="email2" name="email2">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="email3">Email3:</label>
						<input type="email" class="form-control" id="email3" name="email3">
					  </div>
				</div>

				<div class="col-md-6">
					 <div class="form-group">
						<label for="website">Website:</label>
						<input type="text" class="form-control" id="website" name="website">
					  </div>
				</div>
			
				<div class="col-md-12">
				<button type="submit" class="btn btn-info" name="submit">Save</button>
					<button class="btn btn-default">Canel</button>
				</div>
			</div>
			</form>
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

    <script src="<?=base_url()?>user/lib/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>user/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>user/lib/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>user/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>user/lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>user/lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url()?>user/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>user/lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>user/lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?=base_url()?>user/lib/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="<?=base_url()?>user/assets/js/dashforge.js"></script>
    <script src="<?=base_url()?>user/assets/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="<?=base_url()?>user/lib/js-cookie/js.cookie.js"></script>
    <script src="<?=base_url()?>user/assets/js/dashforge.settings.js"></script>
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
<cfoutput>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=&sensor=false"></script>
</cfoutput>

<script type="text/javascript">
    window.onload = function() {
  initialize();
};
</script>
<script type="text/javascript">
//<![CDATA[

    // global "map" variable
    var map = null;
    var marker = null;

    // popup window for pin, if in use
    var infowindow = new google.maps.InfoWindow({ 
        size: new google.maps.Size(150,50)
        });

    // A function to create the marker and set up the event window function 
    function createMarker(latlng, name, html) {

    var contentString = html;

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });

    google.maps.event.trigger(marker, 'click');   

    // google.maps.event.addListener(marker, 'dragend', function() {
    //     infowindow.setContent(contentString); 
    //     infowindow.open(map,marker);
    //     });

    // google.maps.event.trigger(marker, 'dragend');  
    return marker;

}

function initialize() {
    // the location of the initial pin
    var myLatlng = new google.maps.LatLng(28.493814, 77.160629);

    // create the map
    var myOptions = {
        zoom: 19,
        center: myLatlng,
        mapTypeControl: true,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        navigationControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    // establish the initial marker/pin
    var image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png';
    marker = new google.maps.Marker({
        draggable: true,   
      position: myLatlng,
      map: map,
      icon: image,
      title:"Property Location"
    });

    // establish the initial div form fields
    formlat = document.getElementById("latbox").value = myLatlng.lat();
    formlng = document.getElementById("lngbox").value = myLatlng.lng();
    // close popup window
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        });

    // removing old markers/pins
    google.maps.event.addListener(map, 'click', function(event) {
        //call function to create marker
         if (marker) {
            marker.setMap(null);
            marker = null;
         }

        // Information for popup window if you so chose to have one
        /*
         marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);
        */

        // var image = 'googlepins/pin2.png';
        var image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png';
        var myLatLng = event.latLng ;
        /*  
        var marker = new google.maps.Marker({
            by removing the 'var' subsquent pin placement removes the old pin icon
        */
        marker = new google.maps.Marker({
            draggable: true,   
            position: myLatLng,
            map: map,
            icon: image,
            title:"Property Location"
        });

        // populate the form fields with lat & lng 
        formlat = document.getElementById("latbox").value = event.latLng.lat();
        formlng = document.getElementById("lngbox").value = event.latLng.lng();
       });

    google.maps.event.addListener(map, 'dragend', function(event) {
            if (marker) {
            marker.setMap(null);
            marker = null;
            }
            var image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png';
            var myLatLng = event.latLng ;
            marker = new google.maps.Marker({
            draggable: true,   
            position: myLatLng,
            map: map,
            icon: image,
            title:"Property Location"
            });
            formlat = document.getElementById("latbox").value = event.latLng.lat();
            formlng = document.getElementById("lngbox").value = event.latLng.lng();
     });
}
//]]>

</script> 

<script type="text/javascript">
var geocoder = new google.maps.Geocoder();
var address = "new york";

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
var latitude = results[0].geometry.location.latitude;
var longitude = results[0].geometry.location.longitude;
alert(latitude);
} 
}); 
</script>