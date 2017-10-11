@extends('layouts.main')


@section('content')

  <div class="row">
    <div class="col-md-10 col-md-offset-1" style="margin-top: 10px">
       @foreach($employees as $employee)
          @if($employee->id == $click->id)
            <h1><b>{{ $employee->first_name }} {{ $employee->last_name }}</b></h1>
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
        <table class="table table-striped col-md-10" >
            <thead >
              <tr>
              <td><b><a href="/employees/{{ $employee->id }}/edit"><h4>personal Information</h4></a></b></td>
                <td><b><a href="/employees/salary/{{ $employee->id }}"><h4>Salary</h4></a></b></td>
                <td><b><a href="/employees/vacation/{{ $employee->id }}"><h4>Vacation</h4></a></b></td>
                <td><b><a href="/employees/leave/{{ $employee->id }}"><h4>Leave</h4></a></b></td>
                <td><b><a href="/employees/tax/{{ $employee->id }}"><h4>Tax Details</h4></a></b></td>
                <td><b><a href="/employees/benefits/{{ $employee->id }}"><h4>Benefits</h4></a></b></td>
                <td><b><a href="/employees/files/{{ $employee->id }}"><h4>Employee Files</h4></a></b></td>
                <td><b><a href="/employees/deposits/{{ $employee->id }}"><h4>Direct Deposit</h4></a></b></td>
                <td><b><a href="/employees/status/{{ $employee->id }}"><h4>Status</h4></a></b></td>
              </tr>
            </thead>
          </table>
        </div>
    </div>
      @else
      @endif
    @endforeach
  <div class="col-md-10 col-md-offset-1" >
      <div class="panel panel-primary" >

     </div>
  </div>
</div>


      
  <div class="row">
     <div class="col-md-10 col-md-offset-1">
          <h3><b>Status: Active</b></h3><br>
       <div class="panel panel-default" > 
          @if(count($employees))
        <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Active on</b></td>
                <td align="right"><b>Wage Type</b></td>
              </tr>
            </thead>
          @foreach($employees as $employee)
            @if($employee->id == $click->id)
              <thead>
                <tr>
                  <td><b><a href="employees/{{ $employee->id }}/edit">{{ $employee->created_at->toFormattedDateString() }} </a></b></td>
                  <td align="right"> {{ $employee->wages }}</td><br>
                </tr>
              </thead>
            @else
            @endif
          @endforeach
        </table>
          @endif
      </div> 
    </div> 



    <div class="col-md-10 col-md-offset-1">
       <h3><b>Change Status</b></h3><br>
      <div class="panel panel-default">
        <div class="col-md-4 pull-left">
          <h1>$34/Hour</h1><br>
        </div>
         <div class="col-md-6 col-md-offset-2" style="margin-top: 25px">
         <button type="button" class="btn btn-danger col-md-4 pull-right" data-toggle="modal" data-target="#myModalDelete">Delete</button>
		       <div class="modal fade" id="myModalDelete" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content" >
                     <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title" ><b>Delete Employee</b></h4>
                     </div>
                     <div class="modal-body">
                      @if($click->id)
                       <form action="/employees/{{$employee->id}}" method="POST">
		                 {{ method_field('DELETE') }}
		                  {{csrf_field()}}
                        <p>Are you sure you want to delete this employee? The information you have set up will be deleted immediately and you won't be able to undo this.</p>
		                   <div class="modal-footer">
		                       <button class="btn btn-danger" type="submit">Continue Offbording</button>
		                       <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
		                   </div>
		                </form> 
		              @else
		              
		              @endif    
                     </div>
                   </div>  
                 </div>
		       </div>
         </div>
      </div>
     </div>
     <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="col-md-4 pull-left">
          <h1>$34/Hour</h1><br>
        </div>
         <div class="col-md-6 col-md-offset-2" style="margin-top: 25px">
            <button type="button" class="btn btn-primary col-md-4 pull-right" data-toggle="modal" data-target="#myModalOff">Start Offboarding</button>
		       <div class="modal fade" id="myModalOff" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title">Set up Offboarding</h4>
                     </div>
                     <div class="modal-body">
                        <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           
                           <div class="col-md-12 noformpacing {{ $errors->has('employee_files') ? 'has-error' : '' }}">
                              <label >Reason for ending employment<span style="color: red"> * </span></label>
                               <select class="form-control" name="vacation_type" form="selectMenu">
                                  <option>Resignation</option>
                                  <option>On leave</option>
                                  <option>Dismissal with cause</option>
                                  <option>Dismissal without cause</option>
                                  <option>Others</option>
                               </select><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('last_day') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >State the last day of work<span style="color: red"> * </span></label>
                                </div>
                                <input type="date" name="last_day" class="form-control" /><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('notice_date') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >State the notice date<span style="color: red"> * </span></label>
                                </div>
                                <input type="date" name="notice_date" class="form-control" /><br>
                           </div>
		                   <div class="modal-footer">
		                       <button class="btn btn-danger" type="submit">Continue Offbording</button>
		                       <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
		                   </div>
                        </form>
                      </div>
                   </div>  
                 </div>
		       </div>
         </div>
      </div>
    </div>
    <div class="col-md-10 col-md-offset-1" >
        <div class="panel panel-default" >

        </div>
    </div>
    </div>
    <div class="row">
  	  <div class="col-md-10 col-md-offset-1">
          <h3><b>History</b></h3>
       <div class="panel panel-default" > 
          @if(count($employees))
	        <table class="table table-striped table-hover">
	            <thead>
	              <tr style="background-color: #84b1f9">
	                <td><b>Status</b></td>
	                <td align="right"><b>Effective Date</b></td>
	              </tr>
	            </thead>
	          @foreach($employees as $employee)
	            @if($employee->id == $click->id)
	              <thead>
	                <tr>
	                  <td><b><a href="employees/{{ $employee->id }}/edit">Write function for all status</a></b></td>
	                  <td align="right"> {{ $employee->created_at->toFormattedDateString() }}</td><br>
	                </tr>
	              </thead>
	            @else
	            @endif
	          @endforeach
	        </table>
          @endif
        </div> 
      </div> 
    </div>

  </div>




@endsection