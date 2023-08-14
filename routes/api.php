<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api')->prefix('tasks')->group(function(){
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index'); //Get all tasks
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store'); //Create a new task
    Route::get('/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Show a new task by ID
    Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Update a task by ID
    Route::delete('/{task}', [TaskController::class, 'delete'])->name('tasks.delete'); // Delete a task by ID
});
