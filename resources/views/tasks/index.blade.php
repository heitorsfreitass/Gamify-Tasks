@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Tasks</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-lg">Add New Task</i> 
    </a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Your Tasks</h5>
            @if($tasks->isEmpty())
                <p class="text-muted">You have no tasks.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Points</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->points }}</td>
                                <td>
                                    @if($task->completed)
                                        <span class="badge bg-success">Completed</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
