<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('clients/{client}', 'API\ClientController@update');
Route::post('platforms/{platform}', 'API\PlatformController@update');
Route::post('developmentStatuses/{developmentStatus}', 'API\DevelopmentStatusController@update');
Route::post('paymentMethods/{paymentMethod}', 'API\PaymentMethodController@update');
Route::post('projects/{project}', 'API\ProjectController@update');

Route::resources(
  [
    'clients'             => 'API\ClientController',
    'platforms'           => 'API\PlatformController',
    'developmentStatuses' => 'API\DevelopmentStatusesController',
    'paymentMethods'      => 'API\PaymentMethodController',
    'projects'            => 'API\ProjectController'
  ]);
