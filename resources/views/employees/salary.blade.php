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
        <div class="col-md-4 pull-left">
          <h1>$34/Hour</h1>
        </div>
        <div class="col-md-8 " style="margin-top: 25px">
          <button class="btn btn-default col-md-4 pull-right">Change Salary</button>
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
        
       
          @if(count($employees))
        <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Salary History</b></td>
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





@endsection