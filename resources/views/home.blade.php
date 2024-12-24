@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Task List</h1>
    <div>
         <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
    </div>

    <form method="GET" action="{{ route('tasks.index') }}">
        <select name="status" onchange="this.form.submit()">
            <option value="">Filter by Status fghj</option>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </form>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->due_date }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
