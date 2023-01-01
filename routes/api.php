<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NotificationController;

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
//Adds routing for the user related functions. Includes GET, POST, SHOW, PUT/PATCH and DELETE method.
// /users (GET) index
// /users/{id} (GET) show
// /users (POST) create
// /users/{id} (PUT/PATCH) update
// /users/{id} (DELETE) delete
Route::resource('users', UserController::class);

//Adds routing for the shift related functions. Includes GET, POST, SHOW, PUT/PATCH and DELETE method.
// /shifts (GET) index
// /shifts/{id} (GET) show
// /shifts (POST) create
// /shifts/{id} (PUT/PATCH) update
// /shifts/{id} (DELETE) delete
Route::resource('shifts', ShiftController::class);

//Adds routing for the role related functions. Includes GET, POST, SHOW, PUT/PATCH and DELETE method.
// /roles (GET) index
// /roles/{id} (GET) show
// /roles (POST) create
// /roles/{id} (PUT/PATCH) update
// /roles/{id} (DELETE) delete
Route::resource('roles', RoleController::class);

//Adds routing for the role related functions. Includes GET and SHOW method.
// /notifications (GET) index
// /notifications/{id} (GET) show
Route::resource('notifications', NotificationController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
