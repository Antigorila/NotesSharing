@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="card">
            <a href="{{ route('friend_requests.create') }}" class="btn btn-dark">Add friends</a>
        </div>
        <hr class="text-white">
        @if ($user->friends()->count() > 0)
        <div class="container mt-4">
            <div class="row">
                @foreach($user->friends as $friend)
                    <div class="col-md-4">
                        <div class="text-white bg-dark card p-2">
                            <div class="card m-2 mb-0">
                                <div class="card-body text-center">
                                    <div class="mt-3 mb-4">
                                        <img src="{{ asset('storage/default_profile.png') }}" class="rounded-circle img-fluid" style="width: 100px;">
                                    </div>
                                    <h4 class="mb-2">{{ $friend->friend->name }}</h4>
                                    <p>{{ $friend->friend->email }}</p>
                                    <div class="row card bg-dark p-1">
                                        <div class="card p-0 mb-2">
                                            <a class="btn btn-dark" href="{{ route('notes.inspect', $friend->friend) }}">View Notes</a>
                                        </div>
                                        <form method="POST" action="{{ route('friends.destroy', $friend) }}" class="card p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove Friend</button>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="card bg-dark mt-4 text-center">
            <p class="m-2 text-white"><i>You do not have any friends yet</i></p>
        </div>
        @endif
    </div>
</div>


@endsection