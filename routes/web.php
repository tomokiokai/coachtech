<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ManagementController;


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

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('mypage',[MypageController::class,'mypage']);
Route::get('/detail', [ShopController::class, 'detail']);
Route::post('/reserve', [ReserveController::class, 'reserve']);
Route::post('/like',[FavoriteController::class,'like']);
Route::post('/unlike',[FavoriteController::class,'unlike']);
Route::post('/update',[ReserveController::class,'update']);
Route::post('reserve/delete',[ReserveController::class,'remove']);
Route::post('review',[ShopController::class,'review']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function(){

     Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard');

    Route::get('/management', [ManagementController::class, 'index'])
    ->middleware(['auth:admin'])->name('management');

    Route::post('/create', [ManagementController::class, 'create'])
    ->middleware(['auth:admin'])->name('create');

    Route::get('/detail', [ManagementController::class, 'detail'])
    ->middleware(['auth:admin'])->name('detail');

    Route::post('/update', [ManagementController::class, 'update'])
    ->middleware(['auth:admin'])->name('update');

    require __DIR__.'/admin.php';
});

require __DIR__.'/auth.php';//
