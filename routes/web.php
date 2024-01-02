<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

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

//Route: :get();
//Route: :post();
//Route: :put();
//Route: :patch();
//Route: :delete();
//Route: :options();

// Route::get('/', function () {
//     return view('students.index');
// });


// Common routes naming
// index - Show all data or student
// show - Show a single data or student
// create - Shoe a form to add a new user
// store - Store a data
// edit - Show a form to a data
// update - Update a data
// destory - Delete a data

// Route of users
Route::controller(UserController::class)->group(function () {
    Route::get('/register', 'register');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login/process', 'process');
    Route::post('/logout', 'logout');
    Route::post('/store', 'store');
});

// Route of students
Route::controller(StudentController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth');
    Route::get('/add/student', 'create');
    Route::post('/add/student', 'store');
    Route::get('/student/{id}', 'show');
    Route::put('/student/{student}', 'update');
    Route::delete('/student/{student}', 'destroy');
});
