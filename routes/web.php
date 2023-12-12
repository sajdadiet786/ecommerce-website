<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\WishlistController;

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

Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('/collections/',[App\Http\Controllers\Frontend\FrontendController::class,'categories'])->name('categories');
Route::get('/collections/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'products'])->name('products');
Route::get('/collections/{category_slug}/{product_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'productView'])->name('products');
Route::middleware(['auth'])->group(function(){

    Route::get('wishlist',[WishlistController::class,'index']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
Route::get('/sliders','index')->name('slider');
Route::get('/slider/create','create')->name('slider.create');
Route::post('/slider/create','store')->name('slider.create');
Route::get('/slider/{slider_id}','edit')->name('slider.edit');
 Route::post('/slider/{slider_id}','update')->name('slider.update');
 Route::get('/slider/{slider_id}/delete','destroy')->name('slider.delete');

    });
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('index');
        Route::get('/category/create','create')->name('category.create');
        Route::post('/category', 'store')->name('store');
        Route::get('/edit-category/{category_id}','edit')->name('category.edit');
        Route::post('/update-category/{category_id}','update')->name('category.update');
     

    });
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('product');
        Route::get('/product/create','create')->name('product.create');
        Route::post('/products', 'store')->name('product');
        Route::get('/products/{product_id}/edit', 'edit')->name('product.edit');
        Route::post('/products/{product_id}/update','update')->name('product.update');
        Route::get('admin/product-image/{product_image_id}/delete','destroyImage')->name('image.delete');
        Route::get('/products/{product_id}/delete','destroy')->name('product.delete');

    });
    Route::get('/brand',App\Http\Livewire\Admin\Brand\Index::class)->name('brand');
    // Route::get('/category',[CategoryController::class,'index'])->name('index');
    // Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    // Route::post('/category',[CategoryController::class,'store'])->name('store');
    // Route::get('/edit-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
    // Route::post('/update-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');
    // Route::post('delete-category',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('category.delete');
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index')->name('color');
        Route::get('/colors/create','create')->name('color.create');
        Route::post('/colors/create','store')->name('color.create');
        Route::get('/colors/{color_id}/edit', 'edit')->name('color.edit');
        Route::post('/colors/{color_id}/update','update')->name('color.update');
        Route::get('/colors/{color_id}/delete','destroy')->name('color.delete');
      
    });
});
