<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\AdminController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//adminユーザーページ
Route::prefix('admin')->group(function(){
    //管理ユーザー用のビューのルーティング
    Route::get('/login', [AdminController::class,'Index'])->name('login_from');
    Route::post('/login/Admin_User', [AdminController::class,'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class,'Index'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class,'Logout'])->name('admin.logout')->middleware('admin');
});
//generalユーザーページ
Route::prefix('general')->group(function(){
//一般ユーザー用のビューのルーティング


});
