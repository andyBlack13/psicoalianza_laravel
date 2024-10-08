<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeRoleController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Cruds Empleado y cargo
    Route::resource('employees', EmployeeController::class);
    Route::resource('employee-role', EmployeeRoleController::class);
    
    // Endpoint para obtener las ciudades por país
    Route::get('/get-cities/{country_id}', [EmployeeController::class, 'getCities']);
});



