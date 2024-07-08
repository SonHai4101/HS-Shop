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

Route::get('admin/users/login', [\App\Http\Controllers\Admin\Users\LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [\App\Http\Controllers\Admin\Users\LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
        Route::get('main', [\App\Http\Controllers\Admin\MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [\App\Http\Controllers\Admin\MenuController::class, 'create']);
            Route::post('add', [\App\Http\Controllers\Admin\MenuController::class, 'store']);
            Route::get('list', [\App\Http\Controllers\Admin\MenuController::class, 'index']);
            Route::get('edit/{menu}', [\App\Http\Controllers\Admin\MenuController::class, 'show']);
            Route::post('edit/{menu}', [\App\Http\Controllers\Admin\MenuController::class, 'update']);
            Route::DELETE('destroy', [\App\Http\Controllers\Admin\MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [\App\Http\Controllers\Admin\ProductController::class, 'create']);
            Route::post('add', [\App\Http\Controllers\Admin\ProductController::class, 'store']);
            Route::get('list', [\App\Http\Controllers\Admin\ProductController::class, 'index']);
            Route::get('edit/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'show']);
            Route::post('edit/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'update']);
            Route::DELETE('destroy', [\App\Http\Controllers\Admin\ProductController::class, 'destroy']);

        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [\App\Http\Controllers\Admin\SliderController::class, 'create']);
            Route::post('add', [\App\Http\Controllers\Admin\SliderController::class, 'store']);
            Route::get('list', [\App\Http\Controllers\Admin\SliderController::class, 'index']);
            Route::get('edit/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'show']);
            Route::post('edit/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'update']);
            Route::DELETE('destroy', [\App\Http\Controllers\Admin\SliderController::class, 'destroy']);

        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
    });

});

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [\App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [\App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [\App\Http\Controllers\ProductController::class, 'index']);
Route::post('add-cart', [\App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [\App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [\App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [\App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [\App\Http\Controllers\CartController::class, 'addCart']);
