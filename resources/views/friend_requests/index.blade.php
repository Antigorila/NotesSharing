@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="card">
            <a href="{{ route('friend_requests.create') }}" class="btn btn-dark">Add friends</a>
        </div>
        <div class="mt-3 mb-3 card">
            @if (Auth::user()->incoming_requests->count() > 0)
            <div class="card">
                <div class="card bg-dark text-white">
                    <h4 class="m-2">Incoming friend requests</h4>
                    <hr class="m-1 mr-2 ml-2">
                    @foreach (Auth::user()->incoming_requests as $request)
                    <div class="card m-2">
                        <div class="card bg-dark text-white">
                            <h5 class="m-2"><i>{{ $request->from_user->name }}</i> has sent you a friend request</h5>                   
                            <div class="d-flex m-1">
                                <form action="{{ route('friend_requests.accept', $request) }}" method="POST" class="m-1">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Accept</button>
                                </form>
                                <form action="{{ route('friend_requests.decline', $request) }}" method="POST" class="m-1">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Decline</button>
                                </form>
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
        <div class="mt-3 card">
            @if (Auth::user()->outgoing_requests->count() > 0)
            <div class="card">
                <div class="card bg-dark text-white">
                    <h4 class="m-2">Outgoing friend requests</h4>
                    <hr class="m-1 mr-2 ml-2">
                    @foreach (Auth::user()->outgoing_requests as $request)
                    <div class="card m-2">
                        <div class="card bg-dark text-white">
                            <h5 class="m-2">You had sent a friend request to <i>{{ $request->to_user->name }}</i></h5>                   
                            <div class="m-1">
                                <form method="POST" action="{{ route('friend_requests.destroy', $request) }}" class="m-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="card bg-dark mt-4 text-center">
                <p class="m-2 text-white"><i>There is no any outgoing request yet</i></p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
