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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('user/{id}', function(Request $request, $id){
    $user = \App\Models\User::find($id);
    if(!$user) return response('', 404);
});

Route::get('messages', 'Country\MessagesController@messages');
Route::get('messages/{id}', 'Country\MessagesController@messagesById');

Route::post('messages', 'Country\MessagesController@messagesSave');

Route::put('messages/{id}', 'Country\MessagesController@messagesEdit');

Route::delete('messages/{id}', 'Country\MessagesController@messagesDelete');