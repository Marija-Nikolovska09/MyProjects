<?php


use App\Http\Controllers\CoffeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [CoffeController::class, 'home'])->name('users.home');
// Route::get('users', [CoffeController::class, 'home'])->name('users.home');
Route::get('users/create', [CoffeController::class, 'create'])->name('users.create');
Route::post('users/create', [CoffeController::class, 'store'])->name('users.store');
Route::get('users/info', [CoffeController::class, 'show'])->name('users.info');
Route::get('logout', [CoffeController::class, 'logout'])->name('logout');

// Route::resource('books', BookController::class);