<?php
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todo', [TodoController::class, 'index'])->name('Todo');
Route::post('/todo', [TodoController::class, 'store']);

Route::get('todo/{id}/edit', [TodoController::class , 'edit'])->name('todo.edit');
Route::put('todo/{id}', [TodoController::class , 'update'])->name('update');

Route::delete('todo/{id}', [TodoController::class , 'destroy'])->name('destroy'); // Aangepaste route

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
