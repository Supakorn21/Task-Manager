<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // $tasks = User::find(2)->tasks;
        // $user = Task::find(1)->user;
        $tasks =  User::find($user->id)->tasks;
        // return $tasks;

        return view('tasks/all-task');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks/create-task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $user = Auth::user();
        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $user->id;

        $task->save();
        return redirect("/tasks");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task, $id)
    {
        $task =  Task::find($id);

        return view('tasks/show-task', [
            "task" => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, $id)
    {
        $task = Task::find($id);

        return view('tasks/edit-task', [
            "task" => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $user = Auth::user();
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $user->id;
        $task->save();

        return redirect("/tasks/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, $id)
    {
        $task =  Task::find($id)->first();
        $task->delete();
        return redirect('/tasks');
    }
}
