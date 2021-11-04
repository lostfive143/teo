<?php

use App\Http\Controllers\SisterController;
use App\Models\Sister;
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
    $sisters = Sister::orderBy('name')->get();
    return view('/dashboard')->with('sisters', $sisters);

})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('list', SisterController::class);

});
require __DIR__.'/auth.php';
