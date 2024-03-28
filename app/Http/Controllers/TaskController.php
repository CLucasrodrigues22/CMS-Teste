<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            // Listing all tasks
            $task = Task::get();

            return response()->json([
                "status" => true,
                "data" => $task,
            ], 200);
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro ao listar tarefas.",
            ], 500);
        }
    }

    // Store a newly created task in storage
    public function store(StoreTaskRequest $request)
    {
        try {
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
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro ao criar nova tarefas.",
            ], 500);
        }
    }

    // Display the specified task by id.
    public function show(Request $request)
    {
        try {
            // search by id
            $task = Task::find($request->get('id'));

            // Find user related
            $user = $task->user;

            return response()->json([
                "status" => true,
                "data" => $task,
            ], 200);
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro ao exibir tarefa selecionada.",
            ], 500);
        }
    }

    // Update the specified task in storage
    public function update(UpdateTaskRequest $request)
    {
        try {
            // Finding task by id
            $task = Task::find($request->id);

            // Save data ["title", "description", "status"]
            $task->fill($request->all());
            $task->save();

            return response()->json([
                "status" => true,
                "data" => $task
            ], 200);
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro ao atualizar tarefa selecionada.",
            ], 500);
        }
    }

    // Remove the specified task from storage by id.
    public function destroy(Request $request)
    {
        try {
            // Finding task by id
            $task = Task::find($request->get('id'));
            $task->delete();

            return response()->json([
                "status" => true,
                "message" => "Task deleted successfully"
            ], 202);
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro ao deletar tarefa selecionada.",
            ], 500);
        }
    }
}
