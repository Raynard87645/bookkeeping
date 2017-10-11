@extends('layouts.app')

@section('content')

     
  
    <div class="container">
      <br />
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
          <div class="row">
            <form action="{{url('uploads')}}" method="post" enctype="multipart/form-data">
              <div class="col-md-6">
                {{csrf_field()}}
                <input type="file" name="fileupload"/>
              </div>
              <div class="col-md-6">
                  <button class="btn btn-primary" type="submit">Import</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-2">
          <form action="{{url('uploads')}}" enctype="multipart/form-data">
            <button class="btn btn-success" type="submit">Export</button>
          </form>
        </div>
      </div>
     
    </div>
    <div class="row">
    	
            
    </div>
    
    <div class="row">
    
    </div>

    <div class="row ">
    <div class="col-md-1">
      <div class="panel panel-primary">
        <p>this will have logo and information</p>

        
      </div>
    </div>
    <div class="col-md-9 ">
            <div class="panel panel-primary">
     
	      
	      <h2>Sales</h2>
	        @if(count($Sales))
	        <table class="table table-striped">
	          <thead>
	            <tr></tr>
	              <td><b>sales_id</b></td>
	              <td><b>user_id</b></td>
	              <td><b>item_id</b></td>
	              <td><b>customer_id</b></td>
	              <td><b>created_at</b></td>
	              <td><b>updated_at</b></td>
	            
	          </thead>
	          @foreach($Sales as $Sale)
              
	            <tr></tr>
	              <td>{{$Sale->id}}</td>
	              <td>{{$Sale->user_id}}</td>
	              <td>{{$Sale->item_id}}</td>
	              <td>{{$Sale->customer_id}}</td>
	              <td>{{$Sale->created_at}}</td>
	              <td>{{$Sale->updated_at}}</td>
	            
	          @endforeach



	        </table>
	          
    
	        @endif
          <div class="row">
	      </div>

       
   </div>

   
     </div>
   </div>

@endsection