<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'tasks'
], function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::get('/create', [TaskController::class, 'create']);
    Route::post('/', [TaskController::class, 'store']);
    Route::get('/{id}', [TaskController::class, 'show']);
    Route::get('/{id}/edit', [TaskController::class, 'edit']);
    Route::put('/{id}', [TaskController::class, 'update']);
    Route::delete('/{id}', [TaskController::class, 'destroy']);


    // Route::get('/user/profile', function () {
    //     // Uses first & second middleware...
    // });
});


// tasks
// Route::get('/tasks', function () {
//     return view('tasks/all-task');
// })->middleware(['auth', 'verified']);


// Route::post('/tasks/{id}/edit', function () {
//     return view('tasks/edit-task');
// })->middleware(['auth', 'verified']);



// update task
// Route::put('/tasks/{id}', function () {
//     return view('tasks/edit-task');
// })->middleware(['auth', 'verified']);



// delete task
// Route::delete('/tasks/{id}', function () {
//     return view('tasks/edit-task');
// })->middleware(['auth', 'verified']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
