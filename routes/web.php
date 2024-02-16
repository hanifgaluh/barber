<?php

use App\Models\MainPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', f {
//     return vie
// });

Route::get('/home', [MainPageController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//booking
Route::get('/booking/confirm', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');






//dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



//staff
Route::resource('staff', StaffController::class);

Route::get('/staff', function () {
    return view('welcome');
});

Route::get('/staff/create', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.create');
Route::get('/staff/{staff}', [App\Http\Controllers\StaffController::class, 'show'])->name('staff.show');
Route::get('/staff/{staff}/edit', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
