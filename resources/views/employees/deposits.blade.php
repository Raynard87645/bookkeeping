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
<div class="col-md-10 col-md-offset-1">
   <p>If you're paying this employee via Direct Deposit, enter their bank details below.</p><p>
Please note, in order to pay your employees by Direct Deposit, you will need to set up the direct deposit service powered by VersaPay.</p><p>
Your employee will have to complete and sign this authorization form which you must retain or save in the employee files tab.</p><br>
</div>

<div class="col-md-10 col-md-offset-1">
<form action="/employees/{{ $employee->id }}" id="selectMenu" method="POST">
     <div class="panel panel-primary" >
                 <div class="panel-heading">Direct Deposits</div>
          
                <div class="panel-body">
              <div class="col-md-12 " >
                <div class="form-group">
                    <div class="col-md-3 noformpacing">
                         <label class="col-md-12 noformpacing">Routing Number<span style="color: red"> * </span></label>
                        <div class="col-md-6 noformpacing">
                          <input type="field" name="routing_number" class="" value=""  /><br>
                        </div>
                    </div>
                    <div class="col-md-3 noformpacing">
                         <label class="col-md-12 noformpacing">Account number<span style="color: red"> * </span></label>
                      <div class="col-md-6 noformpacing">
                        <input type="date" name="account_number" class="" value=""  /><br>
                      </div>
                    </div>
                    <div class="col-md-3 noformpacing">
                        <label class="col-md-12 noformpacing">Confirm account number<span style="color: red"> * </span></label>
                      <div class="col-md-12 noformpacing">
                        <input type="date" name="account_number" class="" value=""  /><br>
                      </div>
                    </div>
                    <div class="col-md-3 noformpacing">
                        <label class="col-md-12 noformpacing">Bank Type<span style="color: red"> * </span></label>
                      <div class="col-md-12 noformpacing">
                        <input type="radio" name="Bank_type" value="male" checked> Savings &nbsp &nbsp<input type="radio" name="Bank_type" value="female"> Checking <br>
                      </div>
                    </div>
                
                     </div>
                  </div>
                 </div>
               </div>
              <button type="submit" class="btn btn-success pull-right">Save and Continue</button><br>
           </form><br>
        </div>
   <div class="col-md-10 col-md-offset-1" >
        <div class="panel panel-default" >

        </div>
    </div>

  </div>




@endsection