<?php

use App\Present;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/dev', function () {
//     $presents = Present::all();

//     foreach($presents as $key => $p):
//     	$p->number = $key + 1;
//     	$p->save();
//     endforeach;
// });

Route::get('/presents', [
    'as'   => 'presents',
    'uses' => 'PresentsController@getAll'
]);

Route::post('/store', [
    'as'   => 'present.store',
    'uses' => 'PresentsController@store'
]);