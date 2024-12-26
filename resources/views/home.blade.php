@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Task List</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>

        <form method="GET" action="{{ route('tasks.index') }}" class="form-inline">
            <div class="input-group">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">Filter by Status</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </form>
    </div>

    @if ($tasks->isEmpty())
        <div class="alert alert-info">No tasks found for the selected filter.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if ($task->status === 'Completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif ($task->status === 'In Progress')
                                <span class="badge bg-warning text-dark">In Progress</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>
                        <td>{{ $task->due_date }}</td>
                        <td class="text-center">
                            <!-- View Button -->
                            <button type="button" class="btn btn-sm btn-info me-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewTaskModal"
                                    data-title="{{ $task->title }}"
                                    data-description="{{ $task->description }}"
                                    data-status="{{ $task->status }}"
                                    data-due_date="{{ $task->due_date }}">
                                View
                            </button>

                            <!-- Edit Button -->
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Task Details Modal -->
<div class="modal fade" id="viewTaskModal" tabindex="-1" aria-labelledby="viewTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewTaskModalLabel">Task Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="mb-3" id="modalTitle"></h4>
                <p><strong>Description:</strong></p>
                <p id="modalDescription"></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Due Date:</strong> <span id="modalDueDate"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewTaskModal = document.getElementById('viewTaskModal');
        viewTaskModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            // Extract task data from data attributes
            const title = button.getAttribute('data-title');
            const description = button.getAttribute('data-description');
            const status = button.getAttribute('data-status');
            const dueDate = button.getAttribute('data-due_date');

            // Update modal content
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDescription').textContent = description;
            document.getElementById('modalStatus').textContent = status;
            document.getElementById('modalDueDate').textContent = dueDate;
        });
    });
</script>
@endsection
