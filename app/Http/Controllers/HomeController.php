<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $taskService;

    /**
     * Create a new controller instance.
     *
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->middleware('auth');
        $this->taskService = $taskService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $tasks = $this->taskService->getTasksByUser(Auth::id(), $status);

        return view('home', compact('tasks'));
    }

    /**
     * Show the user dashboard with all tasks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $tasks = $this->taskService->getTasksByUser(Auth::id());

        return view('home', compact('tasks'));
    }
}
