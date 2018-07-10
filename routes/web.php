<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/', function (){
//    return view('page/index');
//});
 
Route::get('/', ['as'=>'/','uses'=>'HomePageController@index']);
Route::get('/contact', ['as' => '/contact', 'uses' => 'HomePageController@contact']);
Route::get('/reserve', ['as' => '/reserve', 'uses' => 'HomePageController@reserve']);
Route::post('/store', ['as' => '/store', 'uses' => 'HomePageController@store']);
Route::get('/video', ['as' => '/video', 'uses' => 'HomePageController@video']);
Route::get('/magazine', ['as' => '/magazine', 'uses' => 'HomePageController@magazine']);
Route::get('/magazine/download/{id}','HomePageController@downloadmagazine');
Route::get('/photo/{id}',['as' => 'photo','uses' => 'HomePageController@photo']);
Route::get('/album/{id}','HomePageController@album');







Route::resource('/admin/booking','AdminBookingController');

Route::resource('admin/magazine','AdminMagazineController');
Route::resource('admin/user','AdminUserController');
Route::resource('admin/album','AdminAlbumController');
Route::post('admin/album/createimage', 'AdminAlbumController@createimage');
Route::delete('/album/media','AdminAlbumController@deleteAlbum');

Route::resource('admin/category','AdminCategoryController');
Route::resource('admin/video','AdminVideoController');
Route::resource('admin/covertop','AdminCoverTopController');
Route::post('admin/update/covertop', 'AdminCoverTopController@updatecovertop');
Route::get('admin/delete/covertop/{id}','AdminCoverTopController@deletecovertop');

Route::resource('admin/coverbottom','AdminCoverBottomController');
Route::post('admin/update/coverbottom', 'AdminCoverBottomController@updatecoverbottom');
Route::get('admin/delete/coverbottom/{id}','AdminCoverBottomController@deletecoverbottom');

Route::resource('admin/logo','AdminLogoController');
Route::post('admin/update/logo', 'AdminLogoController@updatelogo');
Route::get('admin/delete/logo/{id}','AdminLogoController@deletelogo');

Route::resource('admin/slider','AdminSliderController');
Route::post('admin/update/slider', 'AdminSliderController@updateslider');
Route::get('admin/delete/slider/{id}','AdminSliderController@deleteslider');