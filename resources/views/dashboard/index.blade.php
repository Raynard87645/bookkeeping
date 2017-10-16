@extends('layouts.main')


@section('content')

   <div class="col-md-10 col-md-offset-1">
      <h1 style="text-align: center; font-size: 50px">Welcome <b>{{ Auth::user()->name }}</b></h1>
      <h1 style="text-align: center; font-size: 50px">Choose where to get started</h1>
         <div class="content " style=" margin-top: 100px">
          <div class=" col-md-4"> 
                <a href="/dashboard/invoice/{{ Auth::user()->id }}">         
	     	       <button class="btn btn-success "><i class="fa fa-credit-card" style="font-size: 100px; margin-top: 30px"></i>
	     		    <h3 >Get Paid For Your Work</h3>
	     		    <h4>Send unlimited invoices <br> and estimates.</h4>
	     	       </button>
	     	    </a> 
	     	</div>
	     	<div class=" col-md-4">
	     	    <a href="/dashboard/finances/{{ Auth::user()->name }}">  
	     	      <button class="btn btn-default"><i class="fa fa-bank" style="font-size: 100px;  margin-top: 30px"></i>
	     		    <h3 >Take Care Of Finances</h3>
	     		    <h4>Automate tracking your <br>income and expenses.</h4>
	     	      </button>
	     	    </a>
	     	</div>
	     	<div class=" col-md-4">
	     	    <a href="/dashboard/receipts/{{ Auth::user()->name }}">  
	     			<button class="btn btn-info"><i class="fa fa-book" style="font-size: 100px;  margin-top: 30px"></i>
		     		<h3>Capture Your Receipts</h3>
		     		<h4>Stay compliant by keeping <br>accurate records.</h4>
	     			</button>
	     		</a>
	     	</div>
         </div>
   </div>


@endsection