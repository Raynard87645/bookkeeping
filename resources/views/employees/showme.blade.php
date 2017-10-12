<div class="panel panel-primary" >
                 <div class="panel-heading">Work Information</div>
   	  		
   	  		      <div class="panel-body">
		   	  	  <div class="col-md-8 col-md-offset-2" >
		   	  		  <div class="form-group">
		   	  		       <label class="col-md-12 noformpacing">Date of Hire <span style="color: red"> * </span></label> 
		   	  		        <div class="col-md-6 noformpacing">
			   	  		      <input type="date" name="hire_date" class="form-control" value="{{ $employees->hire_date }}"  /><br>
			   	  		    </div>

                           <div class="col-md-12 noformpacing">
                            <label >Work Location <span style="color: red"> * </span></label>
				   	  		 <select class="form-control" name="work_location" value="{{ $employees->work_location }}">
							    <option>Employees working from business location</option>
							    <option>Employees working from home</option>
							 </select><br>
				   	  	  </div>
                          <div class="col-md-12 noformpacing">
                          <label >Work Wages <span style="color: red"> * </span></label>
				   	  		 <select class="form-control" name="wages" form="selectMenu" value="{{ $employees->wages }}">
							    <option>Hour</option>
							    <option>Week</option>
							    <option>Month</option>
							    <option>Anually</option>
							 </select><br>
				   	  	  </div>
						  <div class="col-md-12 noformpacing">
	                        <label >Wages Amount <span style="color: red"> * </span></label>
			   	  		     <input type="dollar" name="wages_amount" class="form-control" value="{{ $employees->wages_amount }}" />
                          </div>
                          <div class="col-md-12 noformpacing">
	                        <label >Vacation Policy</label>
			   	  		     <input type="dollar" name="vacation" class="form-control" value="{{ $employees->vacation }}" />
                          </div>
						    
                       </div>
                  </div>
                 </div>
               </div>