<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/welcome', function () {
    return view('welcome');
});
//login
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/registrasi', 'LoginController@registrasi')->name('registrasi');
Route::get('/verifikasi_email', 'LoginController@verifikasi')->name('verifikasi');
Route::post('/postLogin', 'LoginController@postlogin');
Route::post('/postverifikasi', 'LoginController@postverifikasi');
Route::get('/logout','LoginController@logout');


Route::get('/account/verif/{id}','UserController@verif');

// home
Route::get('/','UserController@index_user');

Route::post('/user','UserController@store');



Route::group(['middleware' => ['auth','checkLevel:Admin']], function () {
    Route::get('/dashboard', 'DashboardController@index');

    // data user level
    Route::get('/user_level','UserLevelController@index');
    Route::post('/user_level','UserLevelController@store');
    Route::post('/user_level/edit','UserLevelController@update');
    Route::get('/user_level/delete/{id}','UserLevelController@destroy');

    // data user
    Route::get('/user','UserController@index');
    // Route::post('/user','UserController@store');
    // Route::post('/user/edit','UserController@update');
    Route::get('/user/delete/{id}','UserController@destroy');
    Route::post('/user/edit_pass','UserController@update_pass');

    // data kategori diskon
    Route::get('/kategori_diskon','KategoriDiskonController@index');
    Route::post('/kategori_diskon','KategoriDiskonController@store');
    Route::post('/kategori_diskon/edit','KategoriDiskonController@update');
    Route::get('/kategori_diskon/delete/{id}','KategoriDiskonController@destroy');

    // data diskon
    Route::get('/diskon','DiskonController@index');
    Route::post('/diskon','DiskonController@store');
    Route::post('/diskon/edit','DiskonController@update');
    Route::get('/diskon/delete/{id}','DiskonController@destroy');

    Route::get('/diskon/review/{id}','DiskonController@review');

    // data lokasi diskon
    Route::get('/lokasi_diskon/{id}','LokasiDiskonController@index');
    Route::post('/lokasi_diskon','LokasiDiskonController@store');
    Route::post('/lokasi_diskon/edit','LokasiDiskonController@update');
    Route::get('/lokasi_diskon/delete/{id}','LokasiDiskonController@destroy');

    // data klaim diskon
    Route::get('/klaim_diskon','KlaimDiskonController@index');


});


// HAK AKSES USER (BUKAN TAMPILAN ADMIN)
Route::group(['middleware' => ['auth','checkLevel:Pelanggan,Admin']], function () {
    Route::post('/user/edit','UserController@update');

    // klaim diskon
    Route::post('/pakai_diskon','KlaimDiskonController@store');

    //review diskon
    Route::post('/review_diskon','ReviewDiskonController@store');
});
Route::group(['middleware' => ['auth','checkLevel:Pelanggan']], function () {
    Route::get('/profil','UserController@profil')->name('profil');

    Route::get('/diskon/lokasi','DiskonController@lokasi_diskon');

});

//detail diskon
Route::get('/diskon/detail_diskon/{id}','DiskonController@show');
Route::get('/diskon/list_diskon/{id?}','DiskonController@list_diskon');
Route::get('/diskon/search_diskon','DiskonController@search_diskon');

//kategori
Route::get('/kategori/list_kategori','KategoriDiskonController@list_diskon');


// Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
