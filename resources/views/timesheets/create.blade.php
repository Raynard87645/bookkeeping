@extends('layouts.main')


@section('content')
    <div class="row">
	   <div class="col-md-8 col-md-offset-2">
	      <div class="panel panel-primary">
	        <form action="/employees" id="selectMenu" method="POST" >
                {{csrf_field()}}
		   	  	  <div class="form-group">
		   	  		      <label >Name <span style="color: red"> * </span></label> 
		   	  		      <div class="col-md-12 noformpacing {{ $errors->has('first_name') ? 'has-error' : '' }}">
			   	  		     <input type="text" name="first_name" class="form-control" placeholder="First Name" /><br>
			   	  		  </div>
			   	  		  </div>

	        </form>
	          @if(count($employees))
    	        <table class="table table-striped">
    	          <thead>
    	            <tr style="background-color: #84b1f9">
                    <td><b>Employees</b></td>
    	              <td><b>Regular</b></td>
    	              <td><b>Overtime</b></td>
    	              <td><b>Vacation</b></td>
    	              <td><b>Sick Time</b></td>
    	              <td><b>Total</b></td>
                    <td><b>Edit</b></td>
    	            </tr>
    	          </thead>
			    @foreach($employees as $employee)
			     
    	            <tr>
	                    <td> <input type="checkbox" name="selectBox"></td>
	    	              <td>{{$employee->first_name}}</td>
	    	              <td>{{$employee->last_name}}</td>
	    	              <td>{{$timesheets->regular}}</td>
	    	              <td>{{$timesheets->overtime}}</td> 
	    	              <td>{{$timesheets->vacation}}</td>
	    	              <td>{{$timesheets->sick_time}}</td>
	    	              <td>{{$timesheets->total}}</td>
	                    <td> <a href="#"  ><span class="glyphicon glyphicon-pencil" ></span></a></td>
    	            </tr>
    	        @endforeach
    	         </table>
	    	    @endif 	
	      </div>
		</div>
	</div>

@endsection