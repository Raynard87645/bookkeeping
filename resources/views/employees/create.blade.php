@extends('layouts.main')


@section('content')
  <div class="row">
   <div class="col-md-10 col-md-offset-1">
     
		
		</div>
  </div>
  <div class="row">
       <div class="col-md-10 col-md-offset-1" style="margin-top: 50px">
         @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         @endif
         
   	  	   <form action="/employees" id="selectMenu" method="POST" >
   	  		   <div class="panel panel-primary responsive" >
                 <div class="panel-heading">Personal Information</div>
   	  		
   	  		      <div class="panel-body">
   	  		      <div class="col-md-8 col-md-offset-2" >
   	  		        {{csrf_field()}}
		   	  	  <div class="form-group">
		   	  		      <label >Name <span style="color: red"> * </span></label> 
		   	  		      <div class="col-md-12 noformpacing {{ $errors->has('first_name') ? 'has-error' : '' }}">
			   	  		     <input type="text" name="first_name" class="form-control" placeholder="First Name" /><br>
			   	  		  </div>
			   	  		  <div class="col-md-12 noformpacing {{ $errors->has('last_name') ? 'has-error' : '' }}">
			   	  		     <input type="text" name="last_name" class="form-control" placeholder="Last Name" /><br>
			   	  		  </div>
	                      <div class="col-md-12 noformpacing {{ $errors->has('address_street') ? 'has-error' : '' }}">
	                         <label >Address <span style="color: red"> * </span></label>
			   	  		     <input type="text" name="address_street" class="form-control" placeholder="Street" />
                          </div>
			   	  		  <div class="col-md-7 noformpacing {{ $errors->has('address_town') ? 'has-error' : '' }}">
				   	  		<input type="text" name="address_town" class="form-control" placeholder="City/Town" />
						  </div>
						  <div class="col-md-3 noformpacing {{ $errors->has('address_parish') ? 'has-error' : '' }}">
				   	  		 <select class="form-control" name="address_parish" form="selectMenu" >
				   	  		    <option value=" " disabled selected>Parish</option>
							    <option>Kingston</option>
							    <option>Montego Bay</option>
							    <option>Manchester</option>
							    <option>Trelawny</option>
							 </select><br>
				   	  	  </div>
				   	  	  <div class="col-md-2 noformpacing {{ $errors->has('address_country') ? 'has-error' : '' }}">
				   	  		 <select class="form-control" name="address_country" form="selectMenu">
							    <option value=" " disabled selected>Country</option>
							    <option>JA</option>
							    <option>USA</option>
							    <option>Cuba</option>
							    <option>TT</option>
							 </select><br>
				   	  	  </div>
				   	  	  <div class="col-md-12 noformpacing ">
                           <label >Date of birth <span style="color: red"> * </span></label>
                          </div>
                          <div class="col-md-12 noformpacing">
	                          <div class="col-md-6 noformpacing {{ $errors->has('month') ? 'has-error' : '' }}">
					   	  		 <select class="form-control" name="month" form="selectMenu">
								    <option value=" " disabled selected>Month</option>
								    <option value="1">January</option>
								    <option value="2">February</option>
								    <option value="3">March</option>
								    <option value="4">April</option>
								    <option value="5">May</option>
								    <option value="6">June</option>
								    <option value="7">July</option>
								    <option value="8">August</option>
								    <option value="9">September</option>
								    <option value="10">October</option>
								    <option value="11">November</option>
								    <option value="12">December</option>

								 </select>
					   	  	  </div>
					   	  	  <div class="col-md-3 noformpacing {{ $errors->has('day') ? 'has-error' : '' }}">
					   	  		 <select class="form-control" name="day" form="selectMenu">
								    <option value=" " disabled selected>Day</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								    <option>5</option>
								    <option>6</option>
								    <option>7</option>
								    <option>8</option>
								    <option>9</option>
								    <option>10</option>
								    <option>11</option>
								    <option>12</option>
								    <option>13</option>
								    <option>14</option>
								    <option>15</option>
								    <option>16</option>
								    <option>17</option>
								    <option>18</option>
								    <option>19</option>
								    <option>20</option>
								    <option>21</option>
								    <option>22</option>
								    <option>23</option>
								    <option>24</option>
								    <option>25</option>
								    <option>26</option>
								    <option>27</option>
								    <option>28</option>
								    <option>29</option>
								    <option>30</option>
								    <option>31</option>
								 </select>
					   	  	  </div>
					   	  	  <div class="col-md-3 noformpacing {{ $errors->has('year') ? 'has-error' : '' }}">
					   	  		 <select class="form-control" name="year" form="selectMenu">
								    <option value=" " disabled selected>Year</option>
								    <option>2017</option>
								    <option>2016</option>
								    <option>2015</option>
								    <option>2014</option>
								    <option>2013</option>
								    <option>2012</option>
								    <option>2011</option>
								    <option>2010</option>
								    <option>2009</option>
								    <option>2008</option>
								    <option>2007</option>
								    <option>2006</option>
								    <option>2005</option>
								    <option>2004</option>
								    <option>2003</option>
								    <option>2002</option>
								    <option>2001</option>
								    <option>2000</option>
								    <option>1999</option>
								    <option>1998</option>
								    <option>1997</option>
								    <option>1996</option>
								    <option>1995</option>
								    <option>1994</option>
								    <option>1993</option>
								    <option>1992</option>
								    <option>1991</option>
								    <option>1990</option>
								    <option>1989</option>
								    <option>1988</option>
								    <option>1987</option>
								 </select><br>
					   	  	  </div>
	                          <div class="col-md-12 noformpacing {{ $errors->has('email') ? 'has-error' : '' }}">
	                           <label >Email </label>
	                           <input type="email" name="email" class="form-control" placeholder="Email"/><br>
	                          </div>
	                          <div class="col-md-12 noformpacing {{ $errors->has('ssn') ? 'has-error' : '' }}">
	                           <label >Social Security Number</label>
	                            <input type="field" name="ssn" class="form-control" placeholder="*** ** ***" /><br>
	                          </div>
		   	  		      </div><br>

                  </div>
                 </div>
                </div>
               </div>       
               
               <div class="panel panel-primary responsive" >
                 <div class="panel-heading">Work Information</div>
   	  		
   	  		      <div class="panel-body">
		   	  	  <div class="col-md-8 col-md-offset-2" >
		   	  		  <div class="form-group">
		   	  		       <label class="col-md-12 noformpacing ">Date of Hire <span style="color: red"> * </span></label> 
		   	  		        <div class="col-md-6 noformpacing {{ $errors->has('hire_date') ? 'has-error' : '' }}">
			   	  		      <input type="date" name="hire_date" class="form-control"  /><br>
			   	  		    </div>

                           <div class="col-md-12 noformpacing {{ $errors->has('work_location') ? 'has-error' : '' }}">
                            <label >Work Location <span style="color: red"> * </span></label>
				   	  		 <select class="form-control" name="work_location" placeholder="Parish">
				   	  		    <option value=" " disabled selected>Work Location</option>
							    <option>Employees working from business location</option>
							    <option>Employees working from home</option>
							 </select><br>
				   	  	  </div>
                          <div class="col-md-12 noformpacing {{ $errors->has('wages') ? 'has-error' : '' }}">
                          <label >Work Wages <span style="color: red"> * </span></label>
				   	  		 <select class="form-control" name="wages" form="selectMenu">
				   	  		    <option value=" " disabled selected>Wages</option>
							    <option>Hour</option>
							    <option>Week</option>
							    <option>Month</option>
							    <option>Anual</option>
							 </select><br>
				   	  	  </div>
                          <div class="col-md-12 noformpacing {{ $errors->has('wages_amount') ? 'has-error' : '' }}">
                              <label >Wages Amount <span style="color: red"> * </span></label>
			   	  		     <input type="field" name="wages_amount" class="form-control" placeholder="Wages" />
                          </div>
                          <div class="col-md-12 noformpacing {{ $errors->has('vacation') ? 'has-error' : '' }}">
	                        <label >Vacation Policy </label>
			   	  		     <select class="form-control" name="vacation" form="selectMenu">
								    <option>Yes</option>
								    <option>No</option>
								 </select><br>
                          </div>
						    
                       </div>
                  </div>
                 </div>
               </div>
                   
		   	  		<button type="submit" class="btn btn-success pull-right">Save Employee</button><br>
   	  	   </form><br>




      </div>
   	</div>
@endsection