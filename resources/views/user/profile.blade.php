@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                  
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     <img src="http://api.randomuser.me/portraits/men/49.jpg" class="left-block img-circle img-responsive">
                     <h1>Hello, {!! Auth::user()->name !!} </h1>
                     <h4>{!! $age !!} years old of {!! $location !!}</h4>
                    {!! Auth::user()->name !!} you are logged in as {!! Auth::user()->email !!} 

                    <h3>Hello I am in profile</h3>
                    

                    <p>{{Carbon\carbon::createFromDate(1988,12,23)->age}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
