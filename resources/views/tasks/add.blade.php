@extends('layouts.default')

@section('content')
    <div class="d-flex align-items-center">
        <div class="container card shadow-sm" style="max-width: 800px; margin-top:100px">
            <form method="POST" action="{{ route('task.add.post') }}" class="p-3">
                @csrf
                <div class="mb-3">
                    <h3 class="text-center">Add Task</h3>
                </div>  
                <div class="mb-3">
                    <label for="inputTitle">Title</label>
                    <input name="title" type="text" class="form-control" id="inputTitle">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDeadline">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control" id="inputDeadline">
                    @error('deadline')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDescription">Description</label>
                    <textarea name="description" class="form-control" rows="3" id="inputDescription"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
