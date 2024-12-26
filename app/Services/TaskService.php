<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    public function getTasksByUser($userId, $status = null)
    {
        $query = Task::where('user_id', $userId);

        if ($status) {
            $query->where('status', $status);
        }

        return $query->orderBy('due_date')->get();
    }

    public function createTask(array $data, $userId)
    {
        $data['user_id'] = $userId;
        $data['status'] = $data['status'] ?? 'Pending';

        return Task::create($data);
    }

    public function updateTask(Task $task, array $data)
    {
        return $task->update($data);
    }

    public function deleteTask(Task $task)
    {
        return $task->delete();
    }
}
