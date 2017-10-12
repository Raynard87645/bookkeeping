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
 	<div class="col-md-10 col-md-offset-1" >
      <div class="col-md-1 pull-right" >
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalOff">Options</button>
		       <div class="modal fade" id="myModalOff" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title"><b>Option into Sick Leave Policy</b></h4>
                     </div>
                     <div class="modal-body">
                        <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                               <p>
                            	Since your jurisdiction doesn't have minimum requirements for sick leave, we've put together a basic policy. Once you opt in, you'll be able to adjust it.
                            	</p>

              								<p>Please review how sick time will be handled in payroll:</p>

              								<ul>
              									<li>
              										Only available hours will be paid.
              									</li>
              									<li>
              										Remaining hours will not be paid.
              									</li>
              								</ul>
              								<p>
              								The updated policy will be {{ $employee->created_at->toFormattedDateString() }}
                                             </p>
                                         
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
</div>
@endsection
