<?php

use App\Models\MainPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffController;

use App\Http\Controllers\StaffScheduleController;

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

Route::get('/ProfileStaff/{id}', [BookingController::class,'staff']);

//booking
Route::get('/booking/confirm', [BookingController::class, 'confirm'])->name('booking');
// Route::get('/booking/schedule', [BookingController::class, 'schedule']);
// Route::get('/booking/location', [BookingController::class, 'location']);
// Route::post('/filter-/location', [BookingController::class, 'filterlocation']);
Route::get('/booking/location', [BookingController::class, 'index'])->name('location.index');
Route::get('/booking/schedule', [BookingController::class, 'schedule'])->name('schedule');
Route::post('/booking/schedule/store', [BookingController::class, 'storeSchedule'])->name('storeSchedule');
Route::post('/booking', [BookingController::class, 'staffStore'])->name('booking.store');


// Route untuk mengirimkan permintaan ke halaman lokasi
// Route::get('/booking/location/search', [BookingController::class, 'location'])->name('location.search');
Route::get('/booking/staff/{location}', [BookingController::class, 'Staffs'])->name('booking.staffs');







//dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



//staff
Route::resource('staff', StaffController::class);



Route::get('/staff/create', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.create');
Route::get('/staff/{staff}', [App\Http\Controllers\StaffController::class, 'show'])->name('staff.show');
Route::get('/staff/{staff}/edit', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');

Route::resource('staff-schedule', StaffScheduleController::class);

Route::get('/dashboard/appointment', [StaffScheduleController::class, 'index'])->name('staff-schedule.index');
Route::get('/dashboard/appointment/create', [StaffScheduleController::class, 'create'])->name('staff-schedule.create');
Route::post('/dashboard/appointment', [StaffScheduleController::class, 'store'])->name('staff-schedule.store');
Route::get('/dashboard/appointment/{id}', [StaffScheduleController::class, 'show'])->name('staff-schedule.show');
Route::get('/dashboard/appointment/{id}/edit', [StaffScheduleController::class, 'edit'])->name('staff-schedule.edit');
Route::put('/dashboard/appointment/{id}', [StaffScheduleController::class, 'update'])->name('staff-schedule.update');
Route::delete('/dashboard/appointment/{id}', [StaffScheduleController::class, 'destroy'])->name('staff-schedule.destroy');