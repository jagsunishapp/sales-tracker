

    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      

        <div class="row row-xs">
         
       
		<div class="col-md-12" style="border:1px solid #80808029;padding:10px;">
		<h2 class="bbc text-center">Visits </h2>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<p><b>Completed</b></p>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;background:#0393a9;">
					  70%
					</div>
				  </div>
			</div>
			
			
			<div class="col-md-12">
			<br>
				<p><b>In - Progress</b></p>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%;background:#0393a9;">
					  70%
					</div>
				  </div>
			</div>
			
			
			<div class="col-md-12">
			<br>
				<p><b>Pending</b></p>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;background:#0393a9;">
					  70%
					</div>
				  </div>
			</div>
			
			<div class="col-md-12">
			<br>
				<p><b>Missed</b></p>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:50%;background:#0393a9;">
					  70%
					</div>
				  </div>
			</div>
		</div>
		</div>

       

   
         
         
       
        </div><!-- row -->
		
		
		 <div class="row row-xs" style="padding-top:20px;">
		 
		 <div class="col-md-6" style="border:1px solid #80808029;padding:10px;">
		 <h2 class="bbc text-center">Attendance <span class="text-right"><?=$attend_count?>/<?=$total_users?></span></h2>
		 <hr>
		 
		 <table class="table text-center">
    <thead>
      <tr>
        <th><b>Attendees</b></th>
        <th><b>On-Field</b></th>
        <th><b>In-Office</b></th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<?php
      	if($attend_count-$in_office_count<0)
      	{
      		$on_field = 0;
      	}
      	else
      	{
      		$on_field = $attend_count-$in_office_count;
      	}
      	?>
        <td><?=$attend_count?></td>
        <td><?=$on_field?></td>
        <td><?=$in_office_count?></td>
      </tr>
    </tbody>
  </table> 
		 </div>
		 
		  <div class="col-md-6" style="border:1px solid #80808029;padding:10px;">
		   <h2 class="bbc text-center">Expenses <span class="text-right">0/0</span></h2>
		 <hr>
		 
		 	 <table class="table text-center">
    <thead>
      <tr>
        <th><b>Pending Approval</b></th>
        <th><b>Claimed</b></th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>1</td>
        
      </tr>
     
    </tbody>
  </table>
		  </div>
		 
		 
		 </div>
		
		
		
      </div><!-- container -->
    </div><!-- content -->

    