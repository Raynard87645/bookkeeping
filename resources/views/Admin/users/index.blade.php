@extends('layouts.app')

@section('content')
  <div class="row">
  	<div class="col-md-6 col-md-offset-3">

  	  <h3>{{ $users->total() }} total users</h3>
  	  <h3>in this page you have {{ $users->count() }} total users</h3>
  		<ul class="list-group">
  			@foreach($users as $user)
			     <li class="list-group-item" style="margin-top: 20px">
			     	
			     	<span>
			     		{{ $user -> name}}
			     	</span>

			     	<span class="pull-right clearfix">
			     		Joined ({{ $user -> created_at->diffForHumans() }})

			     		<button class="btn btn-xs btn-primary">Follow</button>
			     	</span>
			     </li>
			     
			  @endforeach

			  {{ $users -> links() }}
			 
  		</ul>
  	</div>
  </div>

@endsection

  




