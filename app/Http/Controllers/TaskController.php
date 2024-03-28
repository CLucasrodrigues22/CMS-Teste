<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    // Initialize objects when an instance of the class is created
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    // Display a listing of the tasks.
    public function index(Request $request)
    {
        // Listing all tasks
        $task = Task::get();

        return response()->json([
            "status" => true,
            "data" => $task,
        ], 200);
    }

    // Store a newly created task in storage
    public function store(StoreTaskRequest $request)
    {
        // POST ["title", "description", "status"]
        $task = Task::create([
            "user_id" => auth()->user()->id,
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status
        ]);

        return response()->json([
            "status" => true,
            "data" => $task,
        ], 201);
    }

    // Display the specified task by id.
    public function show(Request $request)
    {
        // search by id
        $task = Task::find($request->get('id'));

        // Find user related
        $user = $task->user;

        return response()->json([
            "status" => true,
            "data" => $task,
        ], 200);
    }

    // Update the specified task in storage
    public function update(UpdateTaskRequest $request)
    {
        // Finding task by id
        $task = Task::find($request->id);

        // Save data ["title", "description", "status"]
        $task->fill($request->all());
        $task->save();

        return response()->json([
            "status" => true,
            "data" => $task
        ], 200);
    }

    // Remove the specified task from storage by id.
    public function destroy(Request $request)
    {
        // Finding task by id
        $task = Task::find($request->get('id'));
        $task->delete();
        
        return response()->json([
            "status" => true,
            "message" => "Task deleted successfully"
        ], 202);
    }
}
