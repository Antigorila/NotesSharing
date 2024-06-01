@extends('layouts.app')

@section('content')

<div class="card bg-dark m-2 mt-0">
    <div class="card-body">
        <div class="card mt-1 mb-3">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <div class="card m-1 mb-0">
                                <a class="nav-link bg-dark disabled text-white">Views: {{ $note->views }}</a>
                            </div>
                        </li>       
                        @if ($note->user->id == Auth::user()->id)
                        <li class="nav-item">
                            <div class="card m-1 mb-0">
                                <a class="btn btn-warning" href="{{ route('notes.edit', $note) }}">Edit</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="card m-1 mb-0">
                                <form method="POST" action="{{ route('notes.destroy', $note) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <hr class="text-white">
                    <div class="card-body bg-dark text-white">
                        <h5 class="card-title">{{ $note->name }}</h5>
                        <p class="card-text">{{ $note->description }}</p>
                        <hr>
                        <div class="form-group">
                            <textarea id="content" class="form-control" rows="10" readonly>{{ $note->content }}</textarea>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', (event) => {
                                const textarea = document.getElementById('content');
                                textarea.style.height = 'auto';
                                textarea.style.height = textarea.scrollHeight + 'px';
                            });
                        </script>
                        <style>
                            textarea[readonly] {
                                background-color: #f8f9fa; 
                                border: none;
                                resize: none;
                                overflow: hidden;
                                height: auto;
                                min-height: 1em;
                                max-height: none;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection