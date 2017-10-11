@extends('layouts.main')

@section('content')
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create article</div>
   	  		
   	  		<div class="panel-body">
   	  		 <input content="hidden" type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
   	  		    
   	  		    <form action="/articles" method="POST">
   	  		     
   	  		        {{csrf_field()}}
		   	  		  <div class="form-group">
		   	  		  <label for="content">Content</label>

		   	  		  <textarea name="content" class="form-control"></textarea>
		   	  		  	
		   	  		  </div>
		   	  		  <div class="checkbox">
		   	  		    <label>
		   	  		    	<input type="checkbox" name="live"/>
		   	  		    	Live
		   	  		    </label>		   	  		  	
		   	  		  </div>
		   	  		  <div class="form-group">
		   	  		  	<label for="post_on">Post On</label>

		   	  		  	<input type="datetime-local" name="post_on" class="form-control" />
		   	  		  </div>
		   	  		  <button type="submit" class="btn btn-success pull-right">submit</button>
   	  			</form>

   	  		</div>
   	  	</div>
   	  </div>
   </div>




    <!--  <form action="../articles" method="POST">
   	  		        {{csrf_field()}}
		   	  		  <div class="form-group">
		   	  		  <label for="content">Content</label>

		   	  		  <textarea name="content" class="form-control"></textarea>
		   	  		  	
		   	  		  </div>
		   	  		  <div class="checkbox">
		   	  		    <label>
		   	  		    	<input type="checkbox" name="live">
		   	  		    	Live
		   	  		    </label>		   	  		  	
		   	  		  </div>
		   	  		  <div class="form-group">
		   	  		  	<label for="post_on">Post On</label>

		   	  		  	<input type="datetime-local" name="post_on" class="fo">
		   	  		  </div>
		   	  		  <input type="submit" class="btn btn-success pull-right">
   	  			</form> -->
@endsection