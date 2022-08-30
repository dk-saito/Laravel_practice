<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentsController;
use App\Http\Controllers\GeneralPageController;
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

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard');


    // 動画管理のルーティング ここから↓

    // 管理者用の動画一覧ページ
    Route::get('/list', [ContentsController::class, 'list'])
    ->middleware('auth:admin')->name('list');

    Route::get('/detail/{id}',[ContentsController::class,'detail'])
    ->middleware('auth:admin')->name('detail');
    // 動画アップロードページ
    Route::get('/upload_form', function(){
        return view('admin.upload_form');})
        ->middleware(['auth:admin'])->name('upload_form');

    Route::post('/upload_form',[ContentsController::class,'upload_form'])
        ->middleware('auth:admin');
    //削除
    Route::get('/delete/{id}',[ContentsController::class,'delete'])
    ->middleware('auth:admin')->name('delete');
    Route::post('/delete/{id}',[ContentsController::class,'delete'])
    ->middleware('auth:admin')->name('delete');
    //編集機能
    Route::get('/edit/{id}',[ContentsController::class,'edit'])
    ->middleware('auth:admin')->name('edit');
    Route::post('/edit/{id}',[ContentsController::class,'edit'])
    ->middleware('auth:admin');

    //ここ消さないでちょ
    require __DIR__.'/admin.php';
});
require __DIR__.'/admin.php';

Route::prefix('general')->name('general.')->group(function(){
    Route::get('/dashboard', function () {
        return view('general.dashboard');
    })->middleware(['auth:general'])->name('dashboard');

    //ここから一般ユーザー用(prefixでgeneralディレクトリは指定してるのでそこまではreturn以外省略できる)
    Route::get('/list', [GeneralPageController::class, 'list'])
    ->middleware(['auth:general'])->name('list');

    Route::get('/detail/{id}', [GeneralPageController::class, 'detail'])
    ->middleware(['auth:general'])->name('detail');
    require __DIR__.'/general.php';

    Route::get('/my_list', [GeneralPageController::class, 'my_list'])
    ->middleware(['auth:general'])->name('my_list');

    Route::post('/add_my_list/{id}',[GeneralPageController::class,'add_my_list'])
    ->middleware(['auth:general'])->name('add_my_list');;
    require __DIR__.'/general.php';
    
    Route::post('/delete_my_list/{id}',[GeneralPageController::class,'delete_my_list'])
    ->middleware(['auth:general'])->name('delete_my_list');;
    require __DIR__.'/general.php';
});
require __DIR__.'/general.php';
//adminユーザーページ
// Route::prefix('admin')->group(function(){
//     //管理ユーザー用のビューのルーティング
//     Route::get('/login', [AdminController::class,'Index'])->name('login_from');
//     Route::post('/login/Admin_User', [AdminController::class,'Login'])->name('admin.login');

//     Route::get('/dashboard', [AdminController::class,'Index'])->name('admin.dashboard')->middleware('admin');
//     Route::get('/logout',[AdminController::class,'Logout'])->name('admin.logout')->middleware('admin');
// });







//generalユーザーページ
// Route::prefix('general')->group(function(){
// //一般ユーザー用のビューのルーティング
// });

