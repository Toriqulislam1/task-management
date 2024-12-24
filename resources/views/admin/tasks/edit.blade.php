@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Update Task</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{ $task->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Task Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $task->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Task Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control"
                                   value="{{ $task->due_date}}">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                Update Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
