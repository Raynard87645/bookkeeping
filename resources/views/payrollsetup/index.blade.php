@extends('layouts.main')


@section('content')
  <div class="row">
   <div class="col-md-8 col-md-offset-2">
     
		
		</div>
  </div>
  <div class="row">
        <div class="col-md-6 col-md-offset-5">
            <div class="panel panel-primary" >
                <div class="panel-heading">Business Location</div>
   	  		
   	  		<div class="panel-body">
   	  		 
   	  		    
   	  		    <form action="/articles" method="POST">
   	  		     
   	  		        {{csrf_field()}}
		   	  		  <div class="form-group">
		   	  		    <label for="content">Address</label>
	                        <div class="col-md-12 noformpacing">
			   	  		     <input type="field" name="post_on" class="form-control" value="Street" />
                             </div>
			   	  		     <div class="col-md-7 noformpacing">
				   	  		  <input type="text" name="post_on" class="form-control" value="City/Town" />
						    </div>
						    <div class="col-md-3 noformpacing">
				   	  		 <select class="form-control" id="sel1" value="Parish">
							    <option>Kingston</option>
							    <option>Montego Bay</option>
							    <option>Manchester</option>
							    <option>Trelawny</option>
							 </select><br>
				   	  	  </div>
				   	  	  <div class="col-md-2 noformpacing">
				   	  		 <select class="form-control" id="sel1" value="Parish">
							    <option>JA</option>
							    <option>USA</option>
							    <option>Cuba</option>
							    <option>TT</option>
							 </select><br>
				   	  	  </div>
		   	  		  </div><br>
		   	  		<button type="submit" class="btn btn-success pull-right">Save and Continue</button>
   	  			</form>

   	  		</div>
   	  	</div>
   	  </div>
   </div>


@endsection