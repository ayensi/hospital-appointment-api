<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Api\Controllers\UserController;
use \App\Http\Api\Controllers\DistrictController;
use \App\Http\Api\Controllers\CityController;
use \App\Http\Api\Controllers\ClinicController;
use \App\Http\Api\Controllers\HospitalController;
use \App\Http\Api\Controllers\HourController;
use \App\Http\Api\Controllers\DoctorController;
use \App\Http\Api\Controllers\AppointmentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/logout',[UserController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('/district')->group(function (){
    Route::get('/',[DistrictController::class,'get']);
    Route::get('/byCityId/{id}',[DistrictController::class,'getByCityId']);
    Route::get('/byId/{id}',[DistrictController::class,'getById']);
    Route::get('/byName/{name}',[DistrictController::class,'getByName']);
    Route::post('/',[DistrictController::class,'store']);
    Route::put('/{id}',[DistrictController::class,'update']);
    Route::delete('/{id}',[DistrictController::class,'destroy']);
});
Route::middleware('auth:sanctum')->prefix('/city')->group(function (){
    Route::get('/',[CityController::class,'get']);
    Route::get('/byId/{id}',[CityController::class,'getById']);
    Route::get('/byName/{name}',[CityController::class,'getByName']);
    Route::post('/',[CityController::class,'store']);
    Route::put('/{id}',[CityController::class,'update']);
    Route::delete('/{id}',[CityController::class,'destroy']);
});
Route::middleware('auth:sanctum')->prefix('/clinic')->group(function (){
    Route::get('/',[ClinicController::class,'get']);
    Route::get('/byId/{id}',[ClinicController::class,'getById']);
    Route::get('/byName/{name}',[ClinicController::class,'getByName']);
    Route::post('/',[ClinicController::class,'store']);
    Route::put('/{id}',[ClinicController::class,'update']);
    Route::delete('/{id}',[ClinicController::class,'destroy']);
});
Route::middleware('auth:sanctum')->prefix('/hour')->group(function (){
    Route::get('/',[HourController::class,'get']);
    Route::get('/byId/{id}',[HourController::class,'getById']);
    Route::get('/byName/{name}',[HourController::class,'getByName']);
    Route::post('/',[HourController::class,'store']);
    Route::put('/{id}',[HourController::class,'update']);
    Route::delete('/{id}',[HourController::class,'destroy']);
});
Route::middleware('auth:sanctum')->prefix('/hospital')->group(function (){
    Route::get('/',[HospitalController::class,'get']);
    Route::get('/byId/{id}',[HospitalController::class,'getById']);
    Route::get('/byDistrictId/{id}',[HospitalController::class,'getByDistrictId']);
    Route::get('/byName/{name}',[HospitalController::class,'getByName']);
    Route::post('/',[HospitalController::class,'store']);
    Route::put('/{id}',[HospitalController::class,'update']);
    Route::delete('/{id}',[HospitalController::class,'destroy']);
});
Route::middleware('auth:sanctum')->prefix('/doctor')->group(function (){
    Route::get('/',[DoctorController::class,'get']);
    Route::get('/byId/{id}',[DoctorController::class,'getById']);
    Route::get('/byClinicId/{id}',[DoctorController::class,'getByClinicId']);
    Route::get('/byHospitalId/{id}',[DoctorController::class,'getByHospitalId']);
    Route::get('/byName/{name}',[DoctorController::class,'getByName']);
    Route::post('/',[DoctorController::class,'store']);
    Route::put('/{id}',[DoctorController::class,'update']);
    Route::delete('/{id}',[DoctorController::class,'destroy']);
});
Route::middleware('auth:sanctum')->prefix('/appointment')->group(function (){
    Route::post('/',[AppointmentController::class,'store']);
    Route::get('/',[AppointmentController::class,'get']);
    Route::get('/complete/{id}',[AppointmentController::class,'complete']);
    Route::get('/cancel/{id}',[AppointmentController::class,'cancel']);
    Route::delete('/{id}',[AppointmentController::class,'destroy']);
    Route::post('/getAvailableByDoctorId',[AppointmentController::class,'getAvailableAppointmentsByDoctorId']);
    Route::post('/getCompleted',[AppointmentController::class,'getCompletedAppointments']);
    Route::post('/getDue',[AppointmentController::class,'getDueAppointments']);
    Route::post('/getCancelled',[AppointmentController::class,'getCancelledAppointments']);
});
