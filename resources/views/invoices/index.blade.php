@extends('layouts.main')

@section('stylesheets')
   {!! Html::style('/parsley/parsley.css') !!}
@endsection

@section('content')
   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         <div class="col-md-10">
         	<h1>Invoices</h1>
         </div>
         <div class="col-md-2" style="margin-top: 20px">
	       <a href="{{route('invoices.create')}}">
	         <button class="btn btn-primary pull-right">Create Invoice</button>
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
	   	  <form action="{{route('invoices.index')}}" id="invoiceForm" method="post" style="margin-top: 20px" data-parsley-validate ="">
	   	  	  {{ method_field('PUT') }}
	          {{csrf_field()}}
	          <div class="col-md-3  {{ $errors->has('client') ? 'has-error' : '' }}">
	              <select class="form-control" name="client" form="invoiceForm" value="" >
	                <option>All Customers</option>
	                <option>Recent</option>
	                <option>Unrecent</option>
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
	          <div class="col-md-2 {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
	          	<input class="form-control" type="date" name="invoice_date" value="Invoice from" required=""> 
	          </div>
	          <div class="col-md-2 {{ $errors->has('invoice_date_to') ? 'has-error' : '' }}">
	          	<input class="form-control" type="date" name="invoice_date_to" value="Invoice to">
	          </div>
	          <div class="col-md-3 {{ $errors->has('invoice_id') ? 'has-error' : '' }}">
	             <div class="col-md-9 noformpacing">
	          	<input class="form-control" type="field" name="invoice_id" value="Enter Invoice #">
	          	 </div>
	          	<div class="col-md-3 noformpacing">
	          	   <button class="btn btn-primary"><i class="fa fa-search"></i></button>
	          	</div>
	          </div>
	   	  </form>
	   	  </div>
	   	</div>
   	  </div>
      <div class="col-md-10 col-md-offset-1">
   	    <div class="panel panel-default">
   	     @if(count($invoices))
          <table class="table table-striped table-hover" >
            <thead>
              <tr style="background-color: #84b1f9" >
                <td><b>Invoice Number</b></td>
                <td><b>Invoice Date</b></td>
                <td><b>Due Date</b></td>
                <td><b>Client</b></td>
                <td><b>Title</b></td>
                <td><b>Client Address</b></td>
                <td><b>Sub Total</b></td>
                <td><b>Discount</b></td>
                <td><b>Grand Total</b></td>
                <td><b>Edit</b></td>
              </tr>
            </thead>
            @foreach($invoices as $invoice)
              
              <tr>
                <td>{{$invoice->invoice_number}}</td>
                <td>{{$invoice->invoice_date}}</td>
                <td>{{$invoice->due_date}}</td>
                <td>{{$invoice->client}}</td>
                <td>{{$invoice->title}}</td>
                <td>{{$invoice->client_address}}</td>
                <td>{{$invoice->sub_total}}</td>
                <td>{{$invoice->discount}}</td>
                <td>{{$invoice->grand_total}}</td>
                <td> <a href="#"  ><span class="glyphicon glyphicon-pencil" ></span></a></td>
               </tr>

              

            @endforeach
             


          </table>
        
            <div class="row">
                <div class="col-md-6">
                 {{ $invoices->links() }}
               </div>

            </div>
          @endif
	       </div>
	    </div>
	  </div>


@endsection

@section('scripts')
   {!! Html::script('/parsley/parsley.min.js') !!}
@endsection