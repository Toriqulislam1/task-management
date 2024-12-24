<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth::user()->id)->orderBy('due_date')->get();
        return view('home',compact('tasks'));
    }
    public function dashboard()
    {
        $tasks = Task::where('user_id', auth::user()->id)->orderBy('due_date')->get();
        return view('home',compact('tasks'));
    }

}
