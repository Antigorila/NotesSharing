@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach ($users as $user)
    <div class="col-md-4 mb-2">
        <div class="text-white bg-dark card p-2">
            <div class="card m-2">
                <div class="card-body text-center">
                    <div class="mt-3 mb-4">
                        <img src="{{ asset('storage/default_profile.png') }}" class="rounded-circle img-fluid" style="width: 100px;">
                    </div>
                    <h4 class="mb-2">{{ $user->name }}</h4>
                    <p>{{ $user->email }}</p>
                    <div class="row card bg-dark p-1">
                        <div class="row">
                            <form method="POST" action="{{ route('users.destroy', $user) }}" class="m-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>

@endsection