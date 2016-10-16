@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    @if(Auth::user()->is_admin)
                        <p>
                            See all <a href="{{ url('tickets') }}">tickets</a>.
                        </p>                      
                    @else
                        <p>
                            See all your <a href="{{ url('my-tickets') }}">tickets</a> or Open <a href="{{ url('new-ticket') }}">new</a> ticket.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
