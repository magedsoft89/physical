<?php

use App\Http\Controllers\SidebarController;
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
    return redirect('/admin');
});

Route::get('/sidebar/problem/{id}', [SidebarController::class, 'redirectToProblem']);
Route::get('/sidebar/physicaltherapy/{id}', [SidebarController::class, 'redirectToPhysicalTherapy']);
Route::get('/sidebar/clinicalsigns/{id}', [SidebarController::class, 'redirectToClinicalSigns']);
Route::get('/sidebar/prescription/{id}', [SidebarController::class, 'redirectToPrescription']);
Route::get('/sidebar/treatmentsession/{id}', [SidebarController::class, 'redirectToTreatmentSession']);


//Route::get('/', function () {
//    return view('welcome');
//});
