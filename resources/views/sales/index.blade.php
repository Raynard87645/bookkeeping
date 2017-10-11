@extends('layouts.app')

@section('content')

     
 
     <div class="row">
       <div class="col-md-4 col-md-offset-1 pull-left" style="margin-bottom: 3px">
               <h1>Sales</h1>
       </div>
     <div class="col-md-6 col-md-offset-1 pull-left" style="margin-top: 5px">
         <span class="col-md-2 col-md-offset-0 pull-right ">
            
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Import</button>
                <div class="modal fade" id="myModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sales Upload</h4>
                     </div>
                     <div class="modal-body">
                        <form action="{{url('sales/import')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <input type="file" name="sales"/><br>
                           <button class="btn btn-primary" type="submit">Import</button>
                        </form>
                     </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>
                  </div>
                </div>  
              </div>
         </span>
         <span class="col-md-offset-0 pull-right">
            <form action="{{url('sales/export')}}" enctype="multipart/form-data">
               <button class="btn btn-success" type="submit">Export</button>
           </form>
        </span>
      </div>
    </div>
       
    
    <div class="row">
      <div class="col-md-11 col-md-offset-1">
          <div class="panel panel-primary">

	      
	      
	        @if(count($Sales))
    	        <table class="table table-striped table-hover">
    	          <thead>
    	            <tr style="background-color: #84b1f9">
                    <td><b>Select</b></td>
    	              <td><b>sales_id</b></td>
    	              <td><b>user_id</b></td>
    	              <td><b>item_id</b></td>
    	              <td><b>customer_id</b></td>
    	              <td><b>created_at</b></td>
    	              <td><b>updated_at</b></td>
                    <td><b>Edit</b></td>
    	            </tr>
    	          </thead>
    	          @foreach($Sales as $Sale)
                  
    	            <tr>
                    <td> <input type="checkbox" name="selectBox"></td>
    	              <td>{{$Sale->id}}</td>
    	              <td>{{$Sale->user_id}}</td>
    	              <td>{{$Sale->item_id}}</td> 
    	              <td>{{$Sale->customer_id}}</td>
    	              <td>{{$Sale->created_at}}</td>
    	              <td>{{$Sale->updated_at}}</td>
                    <td> <a href="#"  ><span class="glyphicon glyphicon-pencil" ></span></a></td>
    	             </tr>
    	          @endforeach

                
    	        </table>
    	        <div class="row">
                <div class="col-md-12">
                 {{ $Sales->links() }}
               </div>
             </div>
    	        @endif
       </div>
   
     </div>
   </div>

@endsection