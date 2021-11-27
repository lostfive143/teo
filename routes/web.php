<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $students = Student::orderBy('name')->get();
    return view('/dashboard')->with('students', $students);

})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('list', StudentController::class);

});
require __DIR__.'/auth.php';
