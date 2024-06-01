@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="card">
            <a href="{{ route('friend_requests.create') }}" class="btn btn-dark">Add friends</a>
        </div>
        <div class="mt-2">
            @if (Auth::user()->incoming_requests->count() > 0)
            <div class="card">
                <div class="card bg-dark text-white">
                    <h4 class="m-1">Incoming friend requests</h4>
                    <hr class="m-1 mr-2 ml-2">
                    @foreach (Auth::user()->incoming_requests as $request)
                    <div class="card m-2">
                        <div class="card bg-dark text-white">
                            <h5 class="m-1"><i>{{ $request->from_user->name }}</i> has sent you a friend request</h5>                   
                            <div class="d-flex m-1">
                                <a class="btn btn-success mr-2 m-1">Accept</a>
                                <a class="btn btn-danger m-1">Decline</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>                
            @else
            <div class="card bg-dark mt-4 text-center">
                <p class="m-2 text-white"><i>There is no any incoming request yet</i></p>
            </div>
            @endif
        </div>
        <div>
            @if (Auth::user()->outgoing_requests->count() > 0)
                
            @else
            <div class="card bg-dark mt-4 text-center">
                <p class="m-2 text-white"><i>There is no any outgoing request yet</i></p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
