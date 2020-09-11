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

Route::get('/test', function(Request $request){

    //dd($request->headers->get('Authorization'));
    //dd($request->headers->all());

    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Minha primeira resposta API']));
    $response->header('Content-type', 'application/json');
    return $response;
});
/*
Route::get('/products', function(){
    return App\product::all();
});
*/
Route::get('/products', 'Api\\ProductController@index');

