@extends('layouts.main')


@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="margin-top: 10px">
	            <h1><b>{{ $employees->first_name }} {{ $employees->last_name }}</b></h1>
	    </div>
	    <div class="col-md-10 col-md-offset-1">
	    <div class="col-md-10 noformpacing" >
	        <h3><b>Active</b></h2>
	    </div>
	        <div class="col-md-2 noformpacing" style="margin-top: 15px">
	             <a href="#">
	               <button class="btn btn-primary col-md-12">Invite to books</button>
	             </a>
	        </div>
	    </div>    
	    <div class="col-md-12 ">
	      <div class="col-md-10 col-md-offset-1" >
	        <table class="table table-striped col-md-10 responsive" >
	            <thead >
	              <tr>
	              <td><b><a href="/employees/{{ $employees->id }}/edit"><h4>personal Information</h4></a></b></td>
	                <td><b><a href="/employees/salary/{{ $employees->id }}"><h4>Salary</h4></a></b></td>
	                <td><b><a href="/employees/vacation/{{ $employees->id }}"><h4>Vacation</h4></a></b></td>
	                <td><b><a href="/employees/leave/{{ $employees->id }}"><h4>Leave</h4></a></b></td>
	                <td><b><a href="/employees/tax/{{ $employees->id }}"><h4>Tax Details</h4></a></b></td>
	                <td><b><a href="/employees/benefits/{{ $employees->id }}"><h4>Benefits</h4></a></b></td>
	                <td><b><a href="/employees/files/{{ $employees->id }}"><h4>Employee Files</h4></a></b></td>
	                <td><b><a href="/employees/deposits/{{ $employees->id }}"><h4>Direct Deposit</h4></a></b></td>
	                <td><b><a href="/employees/status/{{ $employees->id }}"><h4>Status</h4></a></b></td>
	              </tr>
	            </thead>
	          </table>
	        </div>
	    </div>
	<div class="col-md-10 col-md-offset-1" >
      <div class="panel panel-primary" >

      </div>
    </div>
  </div>
  <div class="row">
       <div class="col-md-10 col-md-offset-1" >
   	  	   <form action="/employees/{{ $employees->id }}" id="selectMenu" method="POST" data-parsley-validate=""'>
   	  		   <div class="panel panel-primary" >
                 <div class="panel-heading">Personal Information</div>
   	  		
   	  		      <div class="panel-body">
   	  		      <div class="col-md-8 col-md-offset-2" >
   	  		        {{ method_field('PUT') }}
   	  		        {{csrf_field()}}
		   	  	  <div class="form-group">
		   	  		      <div class="col-md-12 pull-left noformpacing">
		   	  		        <label >Name <span style="color: red"> * </span></label><br>
		   	  		       </div>
		   	  		      <div class="col-md-12 noformpacing">
			   	  		     <input type="text" name="first_name" class="form-control" value="{{ $employees->first_name }}" /><br>
			   	  		  </div>
			   	  		  <div class="col-md-12 noformpacing">
			   	  		     <input type="text" name="last_name" class="form-control" value="{{ $employees->last_name }}" /><br>
			   	  		  </div>
			   	  		  <div class="col-md-12 pull-left noformpacing">
	                         <label >Address <span style="color: red"> * </span></label><br>
	                       </div>
	                      <div class="col-md-12 noformpacing">
			   	  		     <input type="field" name="address_street" class="form-control" value="{{ $employees->address_street }}" />
                          </div>
			   	  		  <div class="col-md-7 noformpacing">
				   	  		<input type="text" name="address_town" class="form-control" value="{{ $employees->address_town }}" />
						  </div>
						  <div class="col-md-3 noformpacing">
				   	  		 <select class="form-control" name="address_parish" form="selectMenu" value="{{ $employees->address_parish }}">
							    <option>Kingston</option>
							    <option>Montego Bay</option>
							    <option>Manchester</option>
							    <option>Trelawny</option>
							 </select><br>
				   	  	  </div>
				   	  	  <div class="col-md-2 noformpacing">
				   	  		 <select class="form-control" name="address_country" form="selectMenu" value="{{ $employees->address_country }}">
							    <option>JA</option>
							    <option>USA</option>
							    <option>Cuba</option>
							    <option>TT</option>
							 </select><br>
				   	  	  </div>
				   	  	  <div class="col-md-12 noformpacing">
                           <label >Date of birth <span style="color: red"> * </span></label>
                          </div>
                          <div class="col-md-12 noformpacing">
	                          <div class="col-md-6 noformpacing">
					   	  		 <select class="form-control" name="month" form="selectMenu" value="{{ var_dump($employees->day) }}">
								    <option>January</option>
								    <option>February</option>
								    <option>March</option>
								    <option>April</option>
								    <option>May</option>
								    <option>June</option>
								    <option>July</option>
								    <option>August</option>
								    <option>September</option>
								    <option>October</option>
								    <option>November</option>
								    <option>December</option>
								 </select>
					   	  	  </div>
					   	  	  <div class="col-md-3 noformpacing">
					   	  		 <select class="form-control" name="day" form="selectMenu" value="{{ var_dump($employees->day) }}">
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
					   	  	  <div class="col-md-3 noformpacing">
					   	  		 <select class="form-control" name="year" form="selectMenu" value="{{ var_dump($employees->day) }}">
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
	                          <div class="col-md-12 noformpacing">
	                           <label >Email <span style="color: red"> * </span></label>
	                           <input type="email" name="email" class="form-control" value="{{ $employees->email }}" required=""/><br>
	                          </div>
	                          <div class="col-md-12 noformpacing">
	                           <label >Social Security Number</label>
	                            <input type="text" name="ssn" class="form-control" value="{{ $employees->ssn }}" /><br>
	                          </div>
		   	  		      </div><br>

                  </div>
                 </div>
                </div>
               </div>       
               
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
							    <option>Per hour</option>
							    <option>Weekly</option>
							    <option>Monthly</option>
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
		   	  		<button type="submit" class="btn btn-success pull-right">Save and Continue</button><br>
   	  	   </form><br>


      </div>
   	</div>

@endsection


