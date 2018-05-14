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

/* auth */
Route::group(['middleware' =>['api','cors']],function (){
   Route::post('auth/login','Auth\ApiAuthController@login');
   Route::post('auth/register','Auth\RegisterController@create');
});

/* methods which need authentication - JWT Token */
Route::group(['middleware' =>['jwt.auth']],function (){
    Route::post('book','BookController@save');
    Route::put('book/{isbn}','BookController@update');
    Route::delete('book/{isbn}','BookController@delete');
    Route::post('auth/logout','Auth\ApiAuthController@logout');
    Route::get('auth/user','Auth\ApiAuthController@getCurrentAuthenticatedUser');
    Route::post('rating','RatingController@save');
    Route::put('rating/{id}','RatingController@update');
    Route::post('order','OrderController@save');
    Route::get('orders/{user_id}','OrderController@findByUserId');
});


Route::get('books','BookController@index');
Route::get('book/{isbn}','BookController@findByISBN');
Route::get('book/rating/{isbn}','BookController@findByISBNWithRatings');
Route::get('book/checkisbn/{isbn}','BookController@checkISBN');
Route::get('books/search/{searchTerm}','BookController@findBySearchTerm');


Route::get('ratings/{book_id}','RatingController@index');
Route::delete('rating/{id}','RatingController@delete');

Route::get('orders','OrderController@index');



Route::get('user/{id}','BookController@getUser');





