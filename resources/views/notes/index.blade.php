@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="card">
            <a href="{{ route('notes.create') }}" class="btn btn-dark">Create File</a>
        </div>
        <hr class="text-white">
        @if ($user->notes()->count() > 0)
            @foreach ($user->notes as $note)
            <div class="card mt-1 mb-3 border-3">
                <div class="card text-center text-white bg-dark">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <div class="card m-1 mb-0">
                                    <a class="nav-link bg-dark disabled text-white">Views: {{ $note->views }}</a>
                                </div>
                            </li>         
                            <li class="nav-item">
                                <div class="card m-1 mb-0">
                                    <a class="nav-link bg-dark disabled text-white">By: {{ $note->user->name }}</a>
                                </div>
                            </li>     
                        </ul>
                        <hr class="text-white">
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">{{ $note->name }}</h5>
                            <p class="card-text">{{ $note->description }}</p>
                            <hr>
                            <div class="card">
                                <a href="{{ route('notes.show', $note) }}" class="btn btn-dark">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="card bg-dark mt-4 text-center">
            <p class="m-2 text-white"><i>There is no any file yet</i></p>
        </div>
        @endif
    </div>
</div>


@endsection