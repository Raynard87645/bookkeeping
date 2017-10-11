@extends('layouts.main')

@section('content')
   <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>Articles</b></h4> 
                <span>
                 
                 @forelse($users as $user)
                   @if($article->user_id == $user->id)
                   Publish by <b>{{ $user->name }}</b> 
                    @else
                     
                    @endif
                  @empty
                     <p> Sorry there has been an error</p>
                  @endforelse
                </span>
              <span class="pull-right">
                  {{ $article->post_on->diffForHumans() }}<br>
              </span>
            </div>
            <div class="panel-body">
               
                  
                {{ $article->content }}
               
            </div>
          <div class="panel-footer clearfix">
             <div class="content pull-right ">
                 <i class="fa fa-heart   "></i>
                 <i class="fa fa-heart   "></i>
                 <i class="fa fa-heart   "></i>
                 <i class="fa fa-heart   "></i>

             </div>
            
            <a href="{{$article->id}}/edit">
              <i class="fa fa-pencil pull-left "></i>

             </a>
          </div>

        </div>
      </div>
        
   </div>
   


@endsection