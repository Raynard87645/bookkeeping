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
      <div class="panel panel-default">
        <div class="col-md-5 pull-left noformpacing">
          <h1>Vacation Balance: ???</h1>
        </div>
        <div class="col-md-2 noformpacing" >
           <a type="button" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#myModal" style="margin-top: 30px" ></a>
                <div class="modal fade" id="myModal" role="dialog" style="margin-top: 100px">
                 <div class="modal-dialog">
                   <div class="modal-content" >
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title">Edit Vacation Balance</h4>
                     </div>
                     <div class="modal-body">
                        <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <input type="text" name="vacation_balance"/><br>
                        </form>
                     </div>
                   <div class="modal-footer">
                       <a href="/employees">
                       <button class="btn btn-primary">Save Changes</button>
                       </a>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>
                  </div>
                </div>  
              </div>
            </div>
         <div class="col-md-5 " style="margin-top: 25px">
          <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModalp"  >Change Vacation Policy</button>
                <div class="modal fade" id="myModalp" role="dialog" style="margin-top: 100px">
                 <div class="modal-dialog">
                   <div class="modal-content" >
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title">Edit Vacation Balance</h4>
                     </div>
                     <div class="modal-body">
                        <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}} 
                           <div class="col-md-12 noformpacing {{ $errors->has('vacation_type') ? 'has-error' : '' }}">
                             <label >Vacation Policy Type<span style="color: red"> * </span></label>
                               <select class="form-control" name="vacation_type" form="selectMenu">
                                  <option>Accurate vacation time for this employee</option>
                                  <option>Don't offer vacation time for this employee</option>
                                  <option>Payout vacation time for this employee</option>
                               </select><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('vacation_rate') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Vacation Accrual Rate<span style="color: red"> * </span></label>
                                </div>
                                <input type="text" name="vacation_rate" class="col-md-2 " placeholder="0.0" /><br>
                           </div>
                           <div class="col-md-12 noformpacing">
                             <p>for e.g. 4.0 % of regular hours on a 40 hour per week payroll period translates to 80 hours per year</p>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('vacation_date') ? 'has-error' : '' }}">
                              <label >Effective Date<span style="color: red"> * </span></label>
                              <input type="date" name="vacation_date" class="form-control"/>
                           </div>
                           <div class="col-md-12 noformpacing">
                             <p>This vacation policy will take effect on the pay period following the date you choose</p><br>
                           </div>
                        </form>
                     </div>
                   <div class="modal-footer">
                       <a href="/employees">
                       <button class="btn btn-primary">Save Changes</button>
                       </a>
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>  
              </div>
         </div>
      </div>
    </div>
    <div class="col-md-10 col-md-offset-1" style="margin-top: 15px">
        <div class="panel panel-default" >

        </div>
     </div>
     <div class="col-md-10 col-md-offset-1">
          <h3><b>Vacation Policy History</b></h3><br>
       <div class="panel panel-default" > 
          @if(count($employees))
        <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Policy</b></td>
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
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3><b>Frequently Asked Questions</b></h3>
    </div>
  </div>

</div>




@endsection