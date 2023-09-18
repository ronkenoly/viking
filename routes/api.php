<?php

use App\Http\Controllers\SubCountyController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
       return $request->user();});

    Route::get('/phone',[PhoneNumberController::class, 'index'])->name('phone');
    Route::get('/phone',[PhoneNumberController::class, 'add']);
    Route::post('/phone',[PhoneNumberController::class, 'create']);
    Route::get('/phone/{phone}', [PhoneNumberController::class, 'edit']);
    Route::post('/phone/{phone}', [PhoneNumberController::class, 'update']);
    Route::delete('phone/{phone})',[PhoneNumberController::class, 'delete']);   

    Route::middleware('auth:sanctum')->get('/subcounty', function (Request $request) {
        return $request->subcounty();});
   
        Route::get('/subcounty',[SubCountyController::class, 'index'])->name('subcounty');
        Route::get('/sub',[SubCountyController::class, 'add']);
        Route::post('/createsubcounty',[SubCountyController::class, 'createsubcounty']);
        Route::get('/readallsubcounty', [SubCountyController::class, 'readallsubcounty']);
        Route::post('/sub/{sub}', [SubCountyController::class, 'update']);
        Route::delete('sub/{sub}',[SubCountyController::class, 'delete']);

    Route::middleware('auth:sanctum')->get('/Town', function (Request $request) {
            return $request->Town();});
    
        Route::get('/Town',[TownController::class, 'index'])->name('Town');
        Route::get('/Town',[TownController::class, 'add']);
        Route::post('/createTown',[TownController::class, 'createTown']);
        Route::get('/readallTown', [TownController::class, 'readallTown']);
        Route::post('/Town/{Town}', [TownController::class, 'update']);
        Route::delete('/Town{Town})',[TownController::class, 'delete']);
   
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();});
        
        Route::get('/User',[UserController::class, 'index'])->name('User');
        Route::get('/User',[UserController::class, 'add']);
        Route::post('/createUser',[UserController::class, 'createUser']);
        Route::get('/readallUser', [UserController::class, 'readallUser']);
        Route::post('/User/{User}', [UserController::class, 'update']);
        Route::delete('User/{User}',[UserController::class, 'delete']);

    Route::middleware('auth:sanctum')->get('/roles', function (Request $request) {
            return $request->roles();});

        Route::get('/Roles',[RolesController::class, 'index'])->name('Roles');
        Route::get('/Roles',[RolesController::class, 'add']);
       
        
        Route::post('/Roles/{Roles}', [RolesController::class, 'update']);
       
    Route::group(['middleware'=>['auth:sanctum']], function() {
        Route::post('/createRoles',[RolesController::class, 'createRoles']);
        Route::get('/readallRoles', [RolesController::class, 'readallRoles']);
        Route::delete('Roles/{Roles}',[RolesController::class, 'delete']);
    });

    Route::post('/register',[AuthController::class, 'register']);
    Route::post('/login',[AuthController::class, 'login']);