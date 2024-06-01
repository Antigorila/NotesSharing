@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="form-group text-white">
            <h3>Add friend</h3>
            <form method="POST" action="{{ route('friend_requests.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-white">Enter your friend email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Friend's email" required>
                </div>
                <hr class="text-white">
                <div class="card">
                    <button type="submit" class="btn btn-dark">Add</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

@endsection