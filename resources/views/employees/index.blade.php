@extends('layouts.main')


@section('content')
   <div class="row">
      <div class="col-md-10 col-md-offset-1" >
          <div class="col-md-0 noformpacing" >
              <h1>Employees</h1>
           </div>
           <div class="col-md-10 noformpacing" >
              <h3><b>Active</b></h2>
           </div>
           <div class="col-md-2 noformpacing" style="margin-top: 15px">
             <a href="/employees/create">
               <button class="btn btn-primary col-md-12">Add Employee</button>
             </a>
          </div>
	   </div>
     <div class="col-md-10 col-md-offset-1" >
        <div class="panel panel-primary" >

        </div>
     </div>
  </div>
  <div class="row">
     <div class="col-md-10 col-md-offset-1">
       
      <div class="panel panel-primary">

          @if(count($employees))
          <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Name</b></td>
                <td align="right"><b class="col-md-12">edit</b></td>
              </tr>
            </thead>
            @foreach($employees as $employee)
               <thead>
              <tr>
                <td><b><a href="employees/{{ $employee->id }}/edit">{{ $employee->last_name }}, {{ $employee->first_name }}</a></b></td>
                <td align="right"> <a href="employees/{{ $employee->id }}/edit"  ><span class="glyphicon glyphicon-pencil col-md-12" ></span></a></td>
              </tr>
            </thead>
              
            @endforeach
            


          </table>
          @endif

        </div>
        </div>
        
     </div>
@endsection