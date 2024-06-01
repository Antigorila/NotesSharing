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
                                <form method="POST" action="{{ route('notes.destroy', $note) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <form method="POST" action="{{ route('notes.update', $note) }}">
                        @csrf
                        @method('PUT')
                        <hr class="text-white">
                        <div class="card-body bg-dark text-white">
                            <div class="form-group">
                                <h5>Note name</h5>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $note->name }}">
                            </div>
                            <div class="form-group mt-2">
                                <h5>Note description</h5>
                                <textarea name="description" id="description" class="form-control">{{ $note->description }}</textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h5>Note content</h5>
                                <textarea name="content" id="content" class="form-control">{{ $note->content }}</textarea>
                            </div>
                            <div class="card mt-4">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                        </div>
                    </form>
                    
                    <script>
                        document.addEventListener('DOMContentLoaded', (event) => {
                            const adjustHeight = (textarea) => {
                                textarea.style.height = 'auto';
                                textarea.style.height = textarea.scrollHeight + 'px';
                            };
                
                            const descriptionTextarea = document.getElementById('description');
                            adjustHeight(descriptionTextarea);
                
                            const contentTextarea = document.getElementById('content');
                            adjustHeight(contentTextarea);
                        });
                    </script>
                    <style>
                        textarea {
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

@endsection