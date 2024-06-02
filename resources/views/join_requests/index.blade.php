@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach (App\Models\JoinRequest::all() as $request)
    <div class="col-md-4 mb-2">
        <div class="text-white bg-dark card p-2">
            <div class="card m-2">
                <div class="card-body text-center">
                    <div class="mt-3 mb-4">
                        <img src="{{ asset('storage/default_profile.png') }}" class="rounded-circle img-fluid" style="width: 100px;">
                    </div>
                    <h4 class="mb-2">{{ $request->name }}</h4>
                    <p>{{ $request->email }}</p>
                    <div class="row card bg-dark p-1">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('join_requests.accept', $request) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success m-1">Accept</button>
                                </form>
                                <form action="{{ route('join_requests.decline', $request) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1">Decline</button>
                                </form>
                            </div>
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