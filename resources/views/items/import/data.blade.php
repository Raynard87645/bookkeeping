@extends('layouts.app')

@section('content')

     
    <div class="row">
       <div class="col-md-4 col-md-offset-1 pull-left" style="margin-bottom: 3px">
               <h1>Items</h1>
       </div>
     <div class="col-md-6 col-md-offset-1 pull-left" style="margin-top: 5px">
         <span class="col-md-2 col-md-offset-0 pull-right ">
            
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Import</button>
                <div class="modal fade" id="myModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
            <form action="{{url('items/export')}}" enctype="multipart/form-data">
               <button class="btn btn-success" type="submit">Export</button>
           </form>
        </span>
      </div>
    </div>
    
   <div class="row">
     <div class="col-md-11 col-md-offset-1">
       
      <div class="panel panel-primary">

          @if(count($Items))
          <table class="table table-striped">
            <thead>
              <tr></tr>
                <td><b>Items_id</b></td>
                <td><b>Items_name</b></td>
                <td><b>Items_amount</b></td>
                <td><b>Items_short_code</b></td>
                <td><b>created_at</b></td>
                <td><b>updated_at</b></td>
              </tr>
            </thead>
            @foreach($Items as $Item)
              
              <tr>
                <td>{{$Item->id}}</td>
                <td>{{$Item->item_name}}</td>
                <td>{{$Item->item_amount}}</td>
                <td>{{$Item->item_short_code}}</td>
                <td>{{$Item->created_at}}</td>
                <td>{{$Item->updated_at}}</td>
               </tr>
            @endforeach
            


          </table>
            <div class="row">
                <div class="col-md-12">
                 {{ $Items->links() }}
               </div>
            </div>
          @endif

        </div>
        </div>
     </div>
     

@endsection