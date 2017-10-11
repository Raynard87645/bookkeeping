@extends('layouts.app')

@section('content')
   <div class="row">

      @forelse($myblogs as $myblog)
         
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>Articles </b></h4> 
                  @forelse($users as $user)
                   @if($myblog->user_id == $user->id)
                    Publish by <b>{{ $user->name }}</b> 
                    @else
                     
                    @endif
                   @empty
                     <p> Sorry there has been an error</p>
                  @endforelse
                 
                  
                
                  <span class="pull-right">
                      {{ $myblog->updated_at->diffForHumans() }}<br>
                  </span>
                </div>
                <div class="panel-body">

                               
                   
                   {{ $myblog->content }} 
                   
                    
                </div>
              <div class="panel-footer clearfix">
            
          <div class="content pull-left">
              
          @forelse($users as $user)
                @if($myblog->user_id == Auth::id() && $myblog->user_id == $user->id)   
                   <form action="/articles/{{ $myblog->id }}/edit" method="POST"  >
                      {{ method_field('GET') }}
                      {{csrf_field()}}
                  <button class="btn btn-success " >Edit</button>  
                  </form>
                @else
                   
                @endif
            @empty
               <p> Sorry there has been an error</p>
            @endforelse 
            
            
          </div>


             @if($myblog->user_id == Auth::id())
             <form action="/articles/{{$myblog->id}}" method="POST">
                 {{ method_field('DELETE') }}
                  {{csrf_field()}}
                  
                   <div class="content pull-right">
                     <i class="fa fa-heart   "></i>
                     <i class="fa fa-heart   "></i>
                     <i class="fa fa-heart   "></i>
                     <i class="fa fa-heart   "></i>
                     <button class="btn btn-danger ">Delete</button>
                   </div>
               
              </form>
             @else
                 <i class="fa fa-heart pull-right "></i>
                 <i class="fa fa-heart pull-right "></i>
                 <i class="fa fa-heart pull-right "></i>
                 <i class="fa fa-heart pull-right "></i>
             @endif
          </div>
             
          </div>
        </div>
        
        @empty
        @endforelse


      </div>
      
        
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           {{ $myblogs->links() }}
       </div>
   </div>


@endsection
