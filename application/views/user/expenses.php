


    <div class="content content-fixed"     style="padding-top: 0px;">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div style="width:100%;padding-top:50px;">
      
            <h2  class="bbc text-center"">Filters</h2>
          </div>
    
        </div>
		
		

        <div class="row row-xs" style="padding-bottom:40px;">
          
          
          <div class="col-md-12">
		  <form>
		  <div class="row">
		  
		  <div class="col-md-6">
		   <div class="form-group">
				<label for="email">User</label>
				   <select class="form-control selectpicker" id="select-country" data-live-search="true">
                <option data-tokens="china">China</option>
				<option data-tokens="malayasia">Malayasia</option>
				<option data-tokens="singapore">Singapore</option>
					</select>
			</div>
		  </div>
		   <div class="col-md-6">
			  <div class="form-group">
				<label for="email">Status</label>
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
				<label for="email">Expense Category</label>
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
				<label for="email">Date</label>
					<input type="date" class="form-control"/>
			</div>
			 </div>
			 
			 
		  </div>
		  <div class="row">
		  <div class="col-md-6"><button class="btn btn-sm pd-x-15 btn-info btn-uppercase mg-l-5"> View</button>
		   <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"> Clear</button>
		  </div>
		  <div class="col-md-6 text-right"><button class="btn btn-sm pd-x-15 btn-info btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Save as CSV</button></div>
		  </div>
		  </form>
		  </div>
         
          
         
          
         
          </div>
        
		
		
		<div class="row" style="padding-top:40px;border-top:1px solid #00000024;">
		<div class="col-md-12 text-right">
		 <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal1" style=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Expense</button>
		</div>
		
		</div>
		
		 <div class="row row-xs" style="padding-top:50px;">
		
		 <table id="example" class="table table-striped table-bordered"  style="padding-top:20px;">
		  <thead>
            <tr>
                <th><input type="checkbox"/></th>
                <th>User Name</th>
                <th>Expense Head</th>
                <th>Expense Category</th>
                <th>Amount</th>
                <th>Expense Date</th>
				<th>Customer</th>
				<th>Status</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox"/></td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
				 <td>61</td>
                <td><button class="btn btn-secondary">Pending</button></td>
                <td>  <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
            </tr>
      
        </tbody>
        <tfoot>
            <tr>
           <th><input type="checkbox"/></th>
                <th>User Name</th>
                <th>Expense Head</th>
                <th>Expense Category</th>
                <th>Amount</th>
                <th>Expense Date</th>
				<th>Customer</th>
				<th>Status</th>
				<th></th>
            </tr>
        </tfoot>
		 
		 
		 
		 </table>
		 
		 
		 
		 
		 
		 <!--Add Model -->
		 <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="max-width: 600px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background: #4949b1;
    color: white;">
       
          <h4 class="modal-title" style="color:white;">Add Expense</h4>
        </div>
        <div class="modal-body" style="    height: 400px; overflow: scroll; overflow-x: hidden;">
         <table class="table" style="border:0px;">
		 
		  <tr>
		 <td>Select Visit</td>
		 <td><input type="checkbox" class=""/></td>
		 </tr>
		 
		 <tr>
		 <td>Customer Name</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 	 <tr>
		 <td>Visit</td>
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
		 <td>Expense Category</td>
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
		 <td>Expense Head</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 	  <tr>
		 <td>Expense Amount</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 
		 	 <tr>
		 <td>Date & Time</td>
		 <td><input type="date" class="form-control"/></td>
		 </tr>
	
		 
		 	 <tr>
		 <td>Attach Image</td>
		 <td><input type="file" class="form-control"/><br>
		 <button class="btn btn btn-secondary">Add New File</button>
		 </td>
		 </tr>
		 
		 	 	 <tr>
		 <td>Attach Receipt</td>
		 <td><input type="file" class="form-control"/><br>
		 <button class="btn btn btn-secondary">Add New File</button>
		 </td>
		 </tr>

		 
		 </table>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
		 
		 
		   <!-- Edit Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="max-width: 600px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background: #4949b1;">
       
          <h4 class="modal-title" style="color:white;">Expenses - USer Name</h4>
        </div>
        <div class="modal-body" style="    height: 400px; overflow: scroll; overflow-x: hidden;">
         <table class="table" style="border:0px;">
		 <tr>
		 <td>Expense head</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 	 <tr>
		 <td>Expense Category</td>
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
		 <td>Date & Time</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 	 <tr>
		 <td>Customer name</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 	 <tr>
		 <td>Visit</td>
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
		 <td>Attach Image</td>
		 <td><img src="img/no_image_available.jpeg"style="height:80px;"></td>
		 </tr>
		 
		 	 <tr>
		 <td>Attach File</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 	 <tr>
		 <td>Expense Amount</td>
		 <td><input type="text" class="form-control"/></td>
		 </tr>
		 
		 	 <tr>
		 <td>Status</td>
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
		 <td>Reporting head</td>
		 <td>  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select></td>
		 </tr>
		 
		 	 <tr>
		 <td >
		 
		  <label class="radio-inline">
      <input type="radio" name="optradio" checked> Approve
    </label>
	
		</td>
		<td>
    <label class="radio-inline">
      <input type="radio" name="optradio"> Reject
    </label>
		 
		 </td>
		
		 </tr>
		 
		 </table>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
		 
		 </div>
      </div><!-- container -->
    </div><!-- content -->
