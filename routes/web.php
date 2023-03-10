<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Customer\CompareController;
use App\Http\Controllers\Admin\AdminDashboardController;

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


/*
|--------------------------------------------------------------------------
| Auth Route
|--------------------------------------------------------------------------
 */

 Route::group(['middleware' => ['guest']], function() {

    Route::get('/register', [RegisterController::class, 'register'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('auth.store');
    Route::get('/login', [LoginController::class, 'login'])->name('auth.login-form');
    Route::post('/login', [LoginController::class, 'attemptLogin'])->name('auth.login-attempt');

  });


Route::group(['middleware' => ['auth']], function() {

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

});






/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/', [AdminDashboardController::class,'index'])->name('home');


    //Contact Routes
    Route::resource('contact', ContactController::class, ['only' => ['show', 'update']]);

    //Slider Routes
    Route::get('/sliders', [SliderController::class,'index'])->name('sliders.index');
    Route::get('/sliders/create', [SliderController::class,'create'])->name('sliders.create');
    Route::post('/sliders/store', [SliderController::class,'store'])->name('sliders.store');
    Route::put('/sliders/update/{id}', [SliderController::class,'update'])->name('sliders.update');
    Route::get('/sliders/show/{id}', [SliderController::class,'show'])->name('sliders.show');

    // Add Silde To Slider Routes
    Route::get('/sliders/{id}/add-slide', [SlideController::class,'create'])->name('sliders.addSlide.create');
    Route::post('/sliders/{id}/add-slide', [SlideController::class,'store'])->name('sliders.addSlide.store');

    Route::get('/sliders/{slider}/edit-slide/{slide}', [SlideController::class,'edit'])->name('sliders.editSlide');
    Route::put('/sliders/{slider}/update-slide/{slide}', [SlideController::class,'update'])->name('sliders.updateSlide');
    Route::delete('/sliders/{slider}/delete-slide/{slide}', [SlideController::class,'destroy'])->name('sliders.deleteSlide');



    //Categories Routes
    Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');
    Route::put('/categories/update/{id}', [CategoryController::class,'update'])->name('categories.update');
    Route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->name('categories.edit');
    Route::delete('/categories/destroy/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');


    //Brands Routes
    Route::get('/brands', [BrandController::class,'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class,'create'])->name('brands.create');
    Route::post('/brands/store', [BrandController::class,'store'])->name('brands.store');
    Route::put('/brands/update/{brand}', [BrandController::class,'update'])->name('brands.update');
    Route::get('/brands/edit/{brand}', [BrandController::class,'edit'])->name('brands.edit');
    Route::delete('/brands/destroy/{brand}', [BrandController::class,'destroy'])->name('brands.destroy');


    //cars Routes
    Route::get('/cars', [CarController::class,'index'])->name('cars.index');
    Route::get('/cars/create', [CarController::class,'create'])->name('cars.create');
    Route::post('/cars/store', [CarController::class,'store'])->name('cars.store');
    Route::put('/cars/update/{car}', [CarController::class,'update'])->name('cars.update');
    Route::get('/cars/edit/{car}', [CarController::class,'edit'])->name('cars.edit');
    Route::delete('/cars/destroy/{car}', [CarController::class,'destroy'])->name('cars.destroy');
    
    







});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
 */


Route::name('customer.')->group(function () {

    Route::get('/', [HomeController::class,'home'])->name('home');


    

    
    Route::get('/compare-list', [CompareController::class, 'compareList'])->name('compareList');

    Route::get('/add-to-compare-list/{car}', [CompareController::class, 'addToCompareList'])->name('add-to-cpmpare-list');
    Route::get('/remove-from-compare-list/{car}', [CompareController::class, 'removeFromCompareList'])->name('remove-from-compare-list');






});
