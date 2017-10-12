@extends('layouts.main')


@section('content')

  <div class="row">
    <div class="col-md-10 col-md-offset-1" style="margin-top: 10px">
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
  <div class="col-md-10 col-md-offset-1" >
    <div class="panel panel-primary" >

     </div>
  </div>
  </div>
      
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="col-md-5 pull-left noformpacing">
          <h1>Vacation Balance: {{ $employee->vacation_balance }}</h1>
        </div>
        <div class="col-md-2 noformpacing" >
           <a type="button" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#editVacation" style="margin-top: 30px; font-size: 20px " ></a>
                <div class="modal fade" id="editVacation" role="dialog" style="margin-top: 100px">
                 <div class="modal-dialog">
                   <div class="modal-content" >
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title"><b>Edit Vacation Balance</b></h4>
                     </div>
                     <div class="modal-body">
                        <form action="/employees/{{ $employee->id }}" method="post" enctype="multipart/form-data">
                           {{ method_field('PUT') }}
                           {{csrf_field()}} 

                           <label >Vacation Balance<span style="color: red"> * </span></label>
                           <input type="field" name="vacation_balance" value="{{ $employee->vacation_balance }}" /><br>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary">Save Changes</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </form>
                     </div>
                   
                  </div>
                </div>  
              </div>
            </div>
         <div class="col-md-5 " style="margin-top: 25px">
          <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#vacationBabalce"  >Change Vacation Policy</button>
                <div class="modal fade" id="vacationBabalce" role="dialog" style="margin-top: 100px">
                 <div class="modal-dialog">
                   <div class="modal-content" >
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title"><b>Edit Vacation Balance</b></h4>
                     </div>
                     <div class="modal-body">
                        <form id="myselectMenu" action="/employees/{{ $employee->id }}" method="post" enctype="multipart/form-data">
                           {{ method_field('PUT') }}
                           {{csrf_field()}} 
                           <div class="col-md-12 noformpacing {{ $errors->has('vacation_type') ? 'has-error' : '' }}">
                             <label >Vacation Policy Type<span style="color: red"> * </span></label>
                               <select class="form-control" name="vacation_type" form="myselectMenu" value="{{ $employee->vacation_type }}">
                                  <option>Accurate vacation time for this employee</option>
                                  <option>Don't offer vacation time for this employee</option>
                                  <option>Payout vacation time for this employee</option>
                               </select><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('vacation_rate') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Vacation Accrual Rate<span style="color: red"> * </span></label>
                                </div>
                                <input type="text" name="vacation_rate" class="col-md-2 " value="{{ $employee->vacation_rate }}" /><br>
                           </div>
                           <div class="col-md-12 noformpacing">
                             <p>for e.g. 4.0 % of regular hours on a 40 hour per week payroll period translates to 80 hours per year</p>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('vacation_date') ? 'has-error' : '' }}">
                              <label >Effective Date<span style="color: red"> * </span></label>
                              <input type="date" name="vacation_date" class="form-control" value="{{ $employee->vacation_date }}" />
                           </div>
                           <div class="col-md-12 noformpacing">
                             <p>This vacation policy will take effect on the pay period following the date you choose</p><br>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary">Save Changes</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </form>
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
          @if(count($employee))
        <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Policy</b></td>
                <td align="right"><b>Effective Date</b></td>
              </tr>
            </thead>
            @if($employee->id)
              <thead>
                <tr>
                  <td><b>{{ $employee->vacation_rate }} % of hours are paid out each pay period</b></td>
                  <td align="right"> {{ $employee->effective_date }}</td>
                </tr>
              </thead>
            @else
            @endif
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