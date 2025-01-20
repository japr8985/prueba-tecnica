<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::paginate(5);

        return view('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = \App\Enums\TaskStatus::cases();
        
        return view('tasks.create')->with('status', $status);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->all();

        $task = new Task();
        $task->fill($data);
        $task->save();

        return redirect()->route('tasks.index')
            ->with([
                'type' => 'success', 
                'message' => $task->title.' has been updated'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $status = \App\Enums\TaskStatus::cases();
        
        return view('tasks.show')->with([
            'task' => $task,
            'status' => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $status = \App\Enums\TaskStatus::cases();

        return view('tasks.edit')->with([
            'task' => $task,
            'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        
        $task->fill($request->all());
        $task->save();

        return redirect()->route('tasks.index')
            ->with([
                'type' => 'alert-info', 
                'message' => $task->title.' has been updated'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with([
                'type' => 'alert-error', 
                'message' => $task->title.' has been deleted'
            ]);
    }
}
