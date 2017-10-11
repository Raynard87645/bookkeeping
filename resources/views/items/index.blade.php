@extends('layouts.app')

@section('content')
 
     <div class="table-responsive">
    <div class="row">
     <div class="col-md-12 "> 
       <div class="col-md-1 " >
          <a href="#" class="btn btn-info btn-lg" style="margin-top: 10px" >
          <span class="glyphicon glyphicon-home" ></span> Home
           </a>
       </div>
       <div class="col-md-1 col-md-offset-0 pull-left" >
         <h1>Items</h1>
     </div>
     <div class="col-md-6 col-md-offset-1 pull-right" style="margin-top: 5px">
         <span class="col-md-2 col-md-offset-0 pull-right ">
            
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Import</button>
                <div class="modal fade" id="myModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title">Items Upload</h4>
                     </div>
                     <div class="modal-body">
                        <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <input type="file" name="items"/><br>
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
         
            @if(Auth::user())
            <form action="{{url('items/export/{$user->name}')}}" enctype="multipart/form-data">
               <button class="btn btn-success" type="submit">Export</button>
           </form>
           @else
             <p>you have to sign in</p>
           @endif
        
        </span>
      </div>
    </div>
   </div> 
   <div class="row">
    <div class="col-md-12 ">
      <div class="col-md-1">
         
               <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-cog"></span> Cog
           </button><br>

           
           <a href="#">
          <span class="glyphicon glyphicon-user">User</span>
        </a><br>
           <a href="#">
          <span class="glyphicon glyphicon-envelope"> Contact</span>
          </a>


       </div>

  
     <div class="col-md-11 col-md-offset-0 pull-right">

       
      <div class="panel panel-primary">
        
          @if(count($Items))
          <table class="table table-striped table-hover" >
            <thead>
              <tr style="background-color: #84b1f9" >
                <td><b>Select</b></td>
                <td><b>Items_name</b></td>
                <td><b>Items_amount</b></td>
                <td><b>Items_short_code</b></td>
                <td><b>Created_at</b></td>
                <td><b>Updated_at</b></td>
                <td><b>Edit</b></td>
              </tr>
            </thead>
            @foreach($Items as $Item)
              
              <tr>
                <td> <input type="checkbox" name="selectBox"></td>
                <td>{{$Item->item_name}}</td>
                <td>{{$Item->item_amount}}</td>
                <td>{{$Item->item_short_code}}</td>
                <td>{{$Item->created_at}}</td>
                <td>{{$Item->updated_at}}</td>
                <td> <a href="#"  ><span class="glyphicon glyphicon-pencil" ></span></a></td>
               </tr>

              

            @endforeach
             


          </table>
        
            <div class="row">
                <div class="col-md-6">
               <a href="#"> <span class="glyphicon glyphicon-trash"></span></a>
               </div>
                <div class="col-md-6">
                 {{ $Items->links() }}
               </div>

            </div>
          @endif

        </div>
        </div>
     </div>
    </div> 
   </div>

@endsection