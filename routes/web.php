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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/password/reset', function() {
    return view('404');
});

Route::get('/password/reset/{token}', 'Auth\ForgotPasswordController@customResetPasswordForm');
Route::post('/password/reset', 'Auth\ForgotPasswordController@customResetPassword')->name('password.update');

// Admin Routes

Route::get('/admin','Admin\AdminController@loginForm');
Route::post('/admin','Admin\AdminController@login');
Route::group(['middleware'=>['auth'],'prefix'=>'admin'],function(){
    
    Route::get('dashboard','Admin\AdminController@dashboard');
    Route::resource('/city','Admin\CityController');
    Route::resource('/users','Admin\UsersController',[
        'only' => ['index', 'show', 'update']]);
        Route::get('/secrets','Admin\SecretsController@index');
        Route::get('/create-secrets','Admin\SecretsController@createSecretForm');
        Route::post('/create-secrets','Admin\SecretsController@createSecret');
        Route::delete('/secrets/{id}','Admin\SecretsController@destroy');
        Route::get('/change-password','Admin\AdminController@changePasswordForm');
        Route::post('/change-password','Admin\AdminController@changePassword');
});
Route::get('logout', 'Admin\AdminController@logout');
