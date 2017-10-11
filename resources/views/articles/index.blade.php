@extends('layouts.main')

@section('content')
   <div class="row">
      @forelse( $article as $articles )
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>Articles </b></h4> 
              
                 @forelse($users as $user)
                   @if($articles->user_id == $user->id)
                    Publish by <b>{{ $user->name }}</b> 
                    
                    @else
                     
                    @endif
                  @empty
                     <p> Sorry there has been an error</p>
                  @endforelse
                  
               <span class="pull-right">
                  {{ $articles->post_on->diffForHumans() }}<br>
              </span>
   	  		    
              
            </div>
   	  		<div class="panel-body">
   	  		   	  		    
   	  		   {{ $articles->shortContent }}

             
              <a href="articles/{{$articles->id}} ">read more</a>
   	  		</div>
          <div class="panel-footer clearfix">
            
          <div class="content pull-left">
              
          @forelse($users as $user)
                      
                @if($articles->user_id == Auth::id() && $articles->user_id == $user->id && $user->name)  
                     
                   <a href="/articles/myblogs/{{$user->id }}">
                  <button class="btn btn-success pull-left" > My Blogs</button>  </a>
                  
                @elseif($articles->user_id == $user->id && $articles->user_id != Auth::id() ) 
                   <a href="/articles/myblogs/{{ $user->id }}"> 
                  <button class="btn btn-primary " ><b>{{ $user->name }}</b> Blogs</button> </a>
                @else
                   
                @endif
            @empty
               <p> Sorry there has been an error</p>
            @endforelse 
            
          </div>


             @if($articles->user_id == Auth::id())
             <form action="/articles/{{$articles->id}}" method="POST">
                 {{ method_field('DELETE') }}
                  {{csrf_field()}}
                  
                   <div class="content pull-right">
                     <i class="fa fa-heart   " ></i>
                     <i class="fa fa-heart   " style="color: red"></i>
                     <i class="fa fa-heart   " style="color: red"></i>
                     <i class="fa fa-heart   " style="color: red"></i>
                     <button class="btn btn-danger ">Delete</button>
                   </div>
               
              </form>
             @else
                 <span style="margin-top: 20px"><i class="fa fa-heart pull-right " style="color: red"></i>
                 <i class="fa fa-heart pull-right " style="color: red"></i>
                 <i class="fa fa-heart pull-right " style="color: red"></i>
                 <i class="fa fa-heart pull-right "></i></span>
             @endif
          </div>
   	  	</div>
   	  </div>
      @empty
        There is no article 
      @endforelse
        
   </div>
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
         {{ $article->links() }}
       </div>
   </div>


@endsection

<!--  {{ substr( $articles->content, 0, random_int(150, 200)) }} ... get the first 200 words from content
             {{ $articles->ShortContent }} <!-- connect to user model in articles.php --> 