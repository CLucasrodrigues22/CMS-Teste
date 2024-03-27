<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

// Open Routes
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);

// Protected Routes
Route::group(
    ["middleware" => ["auth:sanctum"]],
    function () {
        Route::get("logout", [AuthController::class, "logout"]);
        Route::get("profile", [AuthController::class, "profile"]);
        // Task routes
        Route::get("tasks", [AuthController::class, "index"]);
        Route::post("task-create", [TaskController::class, "store"]);
        Route::get("task-info", [TaskController::class, "show"]);
        Route::put("task-update", [TaskController::class, "update"]);
        Route::delete("task-delete", [TaskController::class, "destroy"]);
    }
);
