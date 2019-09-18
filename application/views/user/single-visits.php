<?php
$i=1;
foreach($profile as $row)
  {
  }
?>
    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">


        <div class="row row-xs" style="padding-bottom:30px;">
		
		<div class="col-md-10 offset-md-1">
		<div class="card">
		<div class="card-body">
		
		<div class="row" id="tabsingle11">
		<form method="post" style="width:100%;">
		
		<div class="col-md-12" style="width:100%;float:left;">
		<h2 class="bbc text-center">Single Visit</h2>
		</div>
		<br>
				<div class="col-md-6" style="width:49%;float:left;">
					 <div class="form-group">
						<label for="email">Customer Name:</label>
						<input type="email" class="form-control" id="email">
					  </div>
					  
					   <div class="form-group">
						<label for="email">Title:</label>
						<input type="email" class="form-control" id="email">
					  </div>
					  
					  
					   <div class="form-group">
						<label for="email">Start Time:</label>
						<input type="time" class="form-control" id="email">
					  </div>
					  
					   <div class="form-group">
						<label for="email">Purpose:</label>
						<select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					  </div>
					  
					  
					   <div class="form-group">
						<label for="email">Owner:</label>
						<select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					  </div>
					  
					   <div class="form-group">
						<label for="email">Status:</label>
						 <select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					  </div>
				</div>
				
				<div class="col-md-6" style="width:49%;float:left;">
					<div class="form-group">
						<label for="email">Contact:</label>
						<select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					</div>
					
					<div class="form-group">
						<label for="email">Date:</label>
						<input type="date" class="form-control" id="email">
					</div>
					
					<div class="form-group">
						<label for="email">End Time:</label>
						<input type="time" class="form-control" id="email">
					</div>
					
					<div class="form-group">
						<label for="email">Assigned To:</label>
						<select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					</div>
					
					<div class="form-group">
						<label for="email">Outcome:</label>
						<select class="form-control" id="sel1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						  </select>
					</div>
					  
					  
				</div>
				
				<div class="col-md-12" style="width:100%;float:left;">
					
					<div class="form-group">
						  <label for="comment">Description:</label>
						  <textarea class="form-control" rows="5" id="comment"></textarea>
						</div>
				</div>
				
				<div class="col-md-12" style="width:100%;float:left;">
					 <button type="button" class="btn btn-info" >Submit</button>
					 <button type="button" class="btn btn-info" >Reset</button>
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				
				</form>
			</div>
		
		</div>
		</div>
		</div>

      </div><!-- container -->

    </div><!-- content -->

  </body>
</html>