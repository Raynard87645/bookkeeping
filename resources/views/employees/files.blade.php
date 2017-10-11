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
   
    </div>
    <div class="col-md-10 col-md-offset-1" style="margin-top: 15px">
        <div class="panel panel-default" >

        </div>
     </div>
     <div class="col-md-10 col-md-offset-1">
	     <div class="col-md-8 noformpacing" >
	          <h1>Employee Files</h1>
	     </div>
	     <div class="col-md-4 noformpacing">
	        <div class="col-md-offset-1 pull-right " style="margin-top: 20px">
	            <form action="{{url('items/export')}}" enctype="multipart/form-data">
	               <button class="btn btn-success" type="submit">Export</button>
	           </form>
	        </div>
		    <div class="col-md-3 pull-right" style="margin-top: 20px">
		    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Import</button>
		       <div class="modal fade" id="myModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title">Files Upload</h4>
                     </div>
                     <div class="modal-body">
                        <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           
                           <div class="col-md-12 noformpacing {{ $errors->has('employee_files') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Choose File<span style="color: red"> * </span></label>
                                </div>
                                <input type="file" name="employee_files"/>
                                <p>25 MB file size limit</p>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('file_discription') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Discription<span style="color: red"> * </span></label>
                                </div>
                                <input type="text" name="file_discription" class="form-control" placeholder="Enter text here"/><br>
                           </div>
		                   <div class="modal-footer">
		                       <button class="btn btn-primary" type="submit">Import</button>
		                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		                   </div>
                        </form>
                      </div>
                   </div>  
                 </div>
		       </div>
		    </div>
	      </div>
     </div>
     <div class="col-md-10 col-md-offset-1"  style="margin-top: 50px">
    <div class="panel panel-default" >

     </div>
  </div>

     <div class="col-md-10 col-md-offset-1">
          <h3><b>Your Files</b></h3><br>
       <div class="panel panel-default" > 
          @if(count($employees))
        <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Files</b></td>
                <td align="right"><b>Effective Date</b></td>
              </tr>
            </thead>
          @foreach($employees as $employee)
            @if($employee->id == $click->id)
              <thead>
                <tr>
                  <td><b><a href="employees/{{ $employee->id }}/edit">{{ $employee->first_name }} {{ $employee->last_name }}</a></b></td>
                  <td align="right"> {{ $employee->created_at->toFormattedDateString() }}</td>
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