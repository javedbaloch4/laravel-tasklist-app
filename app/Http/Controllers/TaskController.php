<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index () {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request) {

        // Validate tasks
        $request->validate([
           'title' => 'required'
        ]);

        // Save the task
        Task::create([
            'title' => $request->title
        ]);

        // Session Message
        session()->flash('msg','Task has been added');

        // Redirect back to task page
        return redirect()->route('/');

    }

    public function delete($id) {

        Task::destroy($id);

        session()->flash('msg','Task has been deleted');

        return redirect()->route('/');



    }
}
