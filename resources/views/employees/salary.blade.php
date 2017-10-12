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
              <div class="menu">
              <td><div class="menuitem"><b><a href="/employees/{{ $employee->id }}/edit"><h4>personal Information</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/salary/{{ $employee->id }}"><h4>Salary</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/vacation/{{ $employee->id }}"><h4>Vacation</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/leave/{{ $employee->id }}"><h4>Leave</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/tax/{{ $employee->id }}"><h4>Tax Details</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/benefits/{{ $employee->id }}"><h4>Benefits</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/files/{{ $employee->id }}"><h4>Employee Files</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/deposits/{{ $employee->id }}"><h4>Direct Deposit</h4></a></b></div></td>
                <td><div class="menuitem"><b><a href="/employees/status/{{ $employee->id }}"><h4>Status</h4></a></b></div></td>
              </div>
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
        <div class="col-md-4 pull-left">
          <h1>${{ $employee->wages_amount }}/{{ $employee->wages }}</h1>
        </div>
        <div class="col-md-8 " style="margin-top: 25px">
          <button type="button" class="btn btn-default col-md-4 pull-right" data-toggle="modal" data-target="#salaryPop">Change Salary</button>
           <div class="modal fade" id="salaryPop" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title"><b>Change Salary</b></h4>
                     </div>
                     <div class="modal-body">
                    <form id="thselectMenu" action="../{{ $employee->id }}" method="post" enctype="multipart/form-data">
                          {{ method_field('PUT') }}
                           {{csrf_field()}}
                      <div class="col-md-12 noformpacing {{ $errors->has('wages_amount') ? 'has-error' : '' }}">
                              <label >Wages Amount <span style="color: red"> * </span></label>
                         <input type="field" name="wages_amount" class="form-control" value="{{ $employee->wages_amount }}" />
                      </div>
                      <div class="col-md-12 noformpacing {{ $errors->has('wages') ? 'has-error' : '' }}">
                        <label >Work Wages <span style="color: red"> * </span></label>
                          <select class="form-control" name="wages" form="thselectMenu" value="{{ $employee->wages }}">
                            <option>Hour</option>
                            <option>Week</option>
                            <option>Month</option>
                            <option>Anual</option>
                          </select><br>
                      </div>
                      <div class="col-md-12 noformpacing {{ $errors->has('ssn') ? 'has-error' : '' }}">
                             <label >Effective Date<span style="color: red"> * </span></label>
                              <input type="date" name="effective_date" class="form-control" value="{{ $employee->effective_date }}" /><br>
                      </div>                  
                       <div class="modal-footer">
                           <button class="btn btn-danger" type="submit">Change Salary</button>
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
  <div class="row">       
    <div class="col-md-10 col-md-offset-1">
      <div class="heading">
          <h3><b>Salary History</b></h3><br>
          </div>
      <div class="panel panel-default" > 
        
       
          @if(count($employee))
        <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Amount</b></td>
                <td align="right"><b>Effective Date</b></td>
              </tr>
            </thead>
              <thead>
                <tr>
                  <td><b>${{ $employee->wages_amount }}/{{ $employee->wages }}</b></td>
                  <td align="right"> {{ $employee->effective_date }}</td>
                </tr>
              </thead>
          
        </table>
          @endif
      </div> 
    </div>   
  </div>





@endsection