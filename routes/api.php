<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('/users', ['uses'=> 'UsersController@createUser']);
Route::post('/users/login', ['uses'=> 'UsersController@getToken']);
Route::post('login', ['uses'=> 'UsersController@authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::apiResource('cuadros', CuadrosController::class);
    
    Route::get('/users', ['uses'=> 'UsersController@index']);
    Route::get('/consulta_cuadros_criterios', 'CuadrosController@consultaPorCriterios');
    Route::get('/promedio_tiempo', 'CuadrosController@calcularPromedioTiempo');
    
});




