@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4" style="font-size: 26px;">Create Task</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-white">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Points</label>
                    <input type="number" name="points" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Task</button>
                <a href="{{ route('tasks') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
