<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\TripController;
use App\Http\Controllers\v1\BookingController;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//localhost:8000/api/register
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix'=>'v1'],function(){
// PUBLIC Routes
    //resources
    // Route::apiResource('users',UserController::class);
    // Route::apiResource('trips',TripController::class);
    // Route::apiResource('bookings',BookingController::class);

   
    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/{id}',[UserController::class,'show']);
    Route::get('/trips',[TripController::class,'index']);
    Route::get('/trips/{slug}',[TripController::class,'show']);
    // Route::post('/users',[UserController::class,'store']);
    // Route::put('/users/{user}',[UserController::class,'update']);
    // Route::delete('/users/{id}',[UserController::class,'destroy']);
    // Route::post('/trips',[TripController::class,'store']);
    // Route::put('/trips/{trip}',[TripController::class,'update']);
    // Route::delete('/trips/{id}',[TripController::class,'destroy']);


    Route::post('/register',[AuthController::class,'register']);
     Route::group(['middleware'=>['throttle:5,1']],function(){
        Route::post('/login',[AuthController::class,'login']);
    });


// PROTECTED Routes (require token)
    Route::group(['middleware'=>['auth:sanctum']],function(){
        Route::post('/users',[UserController::class,'store']);
        Route::put('/users/{user}',[UserController::class,'update']);
        Route::delete('/users/{id}',[UserController::class,'destroy']);
        Route::post('/trips',[TripController::class,'store']);
        Route::put('/trips/{trip}',[TripController::class,'update']);
        Route::delete('/trips/{id}',[TripController::class,'destroy']);

        Route::post('/bookings/{booking}',[BookingController::class,'store']); //{user_id}{trip_id}

        Route::post('/logout',[AuthController::class,'logout']);
    });
});

