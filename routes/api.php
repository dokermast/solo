<?php

use Illuminate\Http\Request;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', 'API\Auth\LoginController@login');
Route::post('register', 'API\Auth\LoginController@register');

Route::group(['middleware' => ['jwt.verify']], function(){
    Route::get('bots', 'API\BotController@bots');
    Route::get('bots/{id}', 'API\BotController@bot');
    Route::post('bots', 'API\BotController@store');
    Route::put('bots/{id}', 'API\BotController@update');
    Route::delete('bots/{id}', 'API\BotController@destroy');

    Route::get('refresh', 'Api\Auth\LoginController@refresh');
});





