<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => 'api',
    'prefix'     => 'auth'
], function ($router) {
    // Route::any('/loginJwt', [AuthController::class, 'loginJwt']);
    Route::post('/check-login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    // Route::post('/logout', [AuthController::class, 'logout']);
    // Route::post('/refresh', [AuthController::class, 'refresh']);
    // Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::get('/get-user', [AuthController::class, 'userProfile']);
    Route::post('/delete-user', [AuthController::class, 'userDelete']);
    Route::get('/user-manage', [AuthController::class, 'userManage']);


    // Route::get('/check', 'AuthController@check');
    // Route::get('/refresh',  [AuthController::class, 'refresh']);

    Route::any('/login', function () {
        return view('login');

    });


});



// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/refresh', [AuthController::class, 'refresh']);
// Route::get('/login', [AuthController::class, 'login']);
// Route::get('/logout', [AuthController::class, 'logout']);
// Route::get('/user', [AuthController::class, 'getUser']);

// Route::middleware('jwt.verify')->group(function() {

//     Route::get('/dashboard', function() {
//         return response()->json(['message' => 'Welcome to dashboard'], 200);
//     });
// });
