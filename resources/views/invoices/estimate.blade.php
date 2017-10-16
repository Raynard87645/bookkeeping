@extends('layouts.main')


@section('content')
   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         <div class="col-md-10">
         	<h1>Invoices</h1>
         </div>
         <div class="col-md-2" style="margin-top: 20px">
	       <a href="">
	         <button class="btn btn-primary">Create Invoice</button>
	       </a>
         </div>
      </div>
    </div>  
   <div class="row">
      <div class="col-md-10 col-md-offset-1">
	   	 <div class="panel panel-primary">
	   	   <div class="panel-body">
	   	   	  <div class="col-md-4">
	   	   	  	 <h4><b>OVERDUE</b><br>
	   	   	  	 <b>J$0.00 JMD</b></h4>
	   	   	  </div>
	   	   	  <div class="col-md-4">
	   	   	  	 <h4><b>COMING DUE WITHIN 30 DAYS</b><br>
	   	   	  	 <b>J$0.00 JMD</b></h4>
	   	   	  </div>
	   	   	  <div class="col-md-4">
	   	   	  	 <h4><b>AVERAGE TIME TO GET PAID</b><br>
	   	   	  	 <b>J$0.00 JMD</b></h4>
	   	   	  </div>
	   	   	  <div class="col-md-12">
	   	   	  	<h4>Last updated:  </h4>
	   	   	  </div>
	   	   </div>
	   	 </div>
   	  </div>
   	  <div class="col-md-10 col-md-offset-1">
   	    <div class="panel panel-default">
   	       <div class="panel-body">
	   	  <form action="" id="invoiceForm" method="post" style="margin-top: 20px">
	   	  	  {{ method_field('PUT') }}
	          {{csrf_field()}}
	          <div class="col-md-3  {{ $errors->has('all_customer') ? 'has-error' : '' }}">
	              <select class="form-control" name="all_customer" form="invoiceForm" value="">
	                <option value="" deselect>All Customers</option>
	                <option>Hour</option>
	                <option>Week</option>
	                <option>Month</option>
	                <option>Anual</option>
	              </select><br>
	          </div>
	          <div class="col-md-2 {{ $errors->has('all_statuses') ? 'has-error' : '' }}">
	              <select class="form-control" name="all_statuses" form="invoiceForm" value="">
	                <option value="" deselect>All Statuses</option>
	                <option>Draft</option>
	                <option>Unsent</option>
	                <option>Sent</option>
	                <option>Viewed</option>
	                <option>Partial</option>
	                <option>Paid</option>
	                <option>Overdue</option>
	              </select><br>
	          </div>
	          <div class="col-md-2 {{ $errors->has('invoice_date_from') ? 'has-error' : '' }}">
	          	<input class="form-control" type="date" name="invoice_date_from" value="Invoice from">
	          </div>
	          <div class="col-md-2 {{ $errors->has('invoice_date_to') ? 'has-error' : '' }}">
	          	<input class="form-control" type="date" name="invoice_date_to" value="Invoice to">
	          </div>
	          <div class="col-md-3 {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
	             <div class="col-md-9 noformpacing">
	          	<input class="form-control" type="field" name="invoice_number" value="Enter Invoice #">
	          	 </div>
	          	<div class="col-md-3 noformpacing">
	          	   <button class="btn btn-primary"><i class="fa fa-search"></i></button>
	          	</div>
	          </div>
	   	  </form>
	   	  </div>
	   	</div>
   	  </div>
   </div>

@endsection