@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Task</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Points</label>
                    <input type="number" name="points" class="form-control" value="{{ $task->points }}" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="completed" class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
                    <label class="form-check-label">Completed</label>
                </div>

                <button type="submit" class="btn btn-success">Update Task</button>
                <a href="{{ route('tasks') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
