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
       <div class="footer">
	       <div class="col-md-10">
	         <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalAdd">Add to Pay</button>
		       <div class="modal fade" id="myModalAdd" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title"><b>Add to Pay</b></h4>
                     </div>
                     <div class="modal-body">
                        <form id="AddToPaySelectMenu" action="/employees/{{ $employee->id }}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           
                           <div class="col-md-12 noformpacing {{ $errors->has('deduct') ? 'has-error' : '' }}">
                              <label >Deductt<span style="color: red"> * </span></label>
                               <select class="form-control" name="deduct" form="selectMenu">
                                  <option>After tax deduction</option>
                                  <option>Before tax deduction</option>
                               </select><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('pay_stub') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Pay stub label<span style="color: red"> * </span></label>
                                </div>
                                <input type="date" name="pay_stub" class="form-control" /><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('amount_deduct') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Amount<span style="color: red"> * </span></label>
                                </div>
                                <input type="field" name="amount_deduct" class="form-control" placeholder="0.0" /><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('deduct_occur') ? 'has-error' : '' }}">
                              <label >Deductt<span style="color: red"> * </span></label>
                               <select class="form-control" name="deduct_occur" form="AddToPaySelectMenu">
                                  <option>Only once</option>
                                  <option>Every check</option>
                                  <option>>Every month</option>
                               </select><br>
                           </div>
		                   <div class="modal-footer">
		                       <button class="btn btn-primary" type="submit">Save</button>
		                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		                   </div>
                        </form>
                      </div>
                   </div>  
                 </div>
		       </div>
	       </div>
              <button type="button" class="btn btn-danger col-md-2" data-toggle="modal" data-target="#myModalOff">Deduct from Pay</button>
		       <div class="modal fade" id="myModalOff" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title"><b>Deduct from Pay</b></h4>
                     </div>
                     <div class="modal-body">
                        <form id="AfterTaxSelectMenu" action="/employees/{{ $employee->id }}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           
                           <div class="col-md-12 noformpacing {{ $errors->has('deduct') ? 'has-error' : '' }}">
                              <label >Deductt<span style="color: red"> * </span></label>
                               <select class="form-control" name="deduct" form="AfterTaxSelectMenu">
                                  <option>After tax deduction</option>
                                  <option>Before tax deduction</option>
                               </select><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('pay_stub') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Pay stub label<span style="color: red"> * </span></label>
                                </div>
                                <input type="date" name="pay_stub" class="form-control" /><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('amount_deduct') ? 'has-error' : '' }}">
                              <div class="col-md-12 noformpacing">
                                <label >Amount<span style="color: red"> * </span></label>
                                </div>
                                <input type="field" name="amount_deduct" class="form-control" placeholder="0.0" /><br>
                           </div>
                           <div class="col-md-12 noformpacing {{ $errors->has('deduct_occur') ? 'has-error' : '' }}">
                              <label >Deductt<span style="color: red"> * </span></label>
                               <select class="form-control" name="deduct_occur" form="AfterTaxSelectMenu">
                                  <option>Only once</option>
                                  <option>Every check</option>
                                  <option>>Every month</option>
                               </select><br>
                           </div>
    		                   <div class="modal-footer">
    		                       <button class="btn btn-primary" type="submit">Save</button>
    		                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    		                   </div>
                        </form>
                      </div>
                   </div>  
                 </div>
		       </div>
       </div>
   </div>
   </div>  
      
  <div class="row">
     <div class="col-md-10 col-md-offset-1">
          <h3><b>Status: Active</b></h3><br>
       <div class="panel panel-default" > 
          @if(count($employee))
        <table class="table table-striped table-hover">
            <thead>
              <tr style="background-color: #84b1f9">
                <td><b>Benefits & Deductions</b></td>
                <td><b>Amount</b></td>
                <td><b>Frequency</b></td>
              </tr>
            </thead>
              <thead>
                <tr>
                  <td><b{{ $employee->created_at->toFormattedDateString() }}</b></td>
                  <td><b>{{ $employee->created_at->toFormattedDateString() }}</b></td>
                  <td><b>{{ $employee->created_at->toFormattedDateString() }}</b></td></a></b></td>
                </tr>
              </thead>
        </table>
          @endif
      </div> 
    </div> 

    <div class="row">
  	  <div class="col-md-10 col-md-offset-1">
          <h3><b>Status: Expired</b></h3>
       <div class="panel panel-default" > 
          @if(count($employee))
	        <table class="table table-striped table-hover">
	            <thead>
	              <tr style="background-color: #84b1f9">
	                <td><b>Benefits & Deductions</b></td>
	                <td><b>Amount</b></td>
	                <td><b>Frequency</b></td>
	              </tr>
	            </thead>
	              <thead>
	                <tr>
	                  <td><b{{ $employee->created_at->toFormattedDateString() }}</b></td>
                  <td><b>{{ $employee->created_at->toFormattedDateString() }}</b></td>
                  <td><b>{{ $employee->created_at->toFormattedDateString() }}</b></td>
	                </tr>
	              </thead>
	        </table>
          @endif
        </div> 
      </div> 
    </div>

  </div>




@endsection