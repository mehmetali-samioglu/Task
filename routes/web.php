<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::group([ 'prefix' => '{locale}', 'name'=>'{locale}.', 'where' => ['locale' => '[a-zA-Z]{2}'],  'middleware' => 'localize'], function() {
    Route::group(['middleware' => 'loginCheck' ], function(){
        Route::get('/',[AuthController::class,'loginForm'])->name('login.form');
        Route::post('login',[AuthController::class,'login'])->name('login.post');
    });

    Route::group(['middleware' => 'auth' ], function(){
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');

        Route::prefix('users')->group(function () {
            Route::get('list', [UserController::class,'index'])->name('user.list');
            Route::get('form/{id?}', [UserController::class,'form'])->name('user.edit');
            Route::post('save/{id?}', [UserController::class,'saveForm'])->name('user.save');
            Route::post('delete/{id?}', [UserController::class,'delete'])->name('user.delete');
        });

        Route::get('/logout',[AuthController::class,'logOut'])->name('login.logout');
    });

});
// Route::get('/', function () {
//     return view('welcome');
// });
