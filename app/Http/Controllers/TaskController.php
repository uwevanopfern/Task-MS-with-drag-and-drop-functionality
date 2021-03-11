<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display all tasks and order them with priority in ASCENDING order
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('priority', 'ASC')->paginate(10);
        return view('tasks.index')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create')->withProjects($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data and add a new enrty
        Task::create($this->validateRequest());
        //Redirect on tasks list after new entry has been added
        Session::flash('success', 'Task added successfully');
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        // dd($task);
        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //Validate data and update existing enrty
        $task->update($this->validateRequest());
        //Redirect on tasks detail after existing entry has been updated
        Session::flash('success', 'Task updated successfully');
        return redirect('tasks/' . $task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('tasks');
    }

    /**
     * Private function to used on store and on update methods to validate requests data
     */
    private function validateRequest()
    {
        return request()->validate([
            'task_name' => 'required|string',
            'project_id' => 'required|numeric',
            'priority' => 'required|numeric|gt:0',
        ]);
    }
}
