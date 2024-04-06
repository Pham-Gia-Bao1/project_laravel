<?php

// use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CarController;
use App\Http\Controllers;
use App\Http\Controllers\Admin\CategoriesAdminController;
use App\Http\Controllers\DetailCoffeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\ProductControlller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\Authenticate;
// use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('profile_edit', [ProfileController::class, 'get_info_user'])->name('profile.edit'); // Đặt tên đặc biệt cho route
    Route::get('create_card', function () {
        return view('profile.Add-new-card');
    });
    Route::post('create_card', [ProfileController::class, 'create_card']);
    Route::get('profile', function () {
        return view('profile.Wallet');
    })->name('Profile');

    Route::get('/favourite/{product}', [HomeController::class, 'favorite'])->name('Favorite');


    Route::get('/favouriteList', [HomeController::class, 'viewAllFavoriteList'])->name('FavoriteList');

    Route::get('/deleteFavoriteProduct/{id}', [HomeController::class, 'removeFromFavorites'])->name('deleteFavoriteList');

    Route::post('profile',[ProfileController::class, 'edit_profile'])->name('Profile');

    Route::get('changeAvatar', function () {
        return view('profile.Edit_avatar');
    })->name('changeAvatar');

    Route::post('changeAvatar', [ProfileController::class, 'changeAvatar'])->name('changeAvatar');
    Route::get('payment', [PaymentController::class, 'index'])->name('Payment');
    Route::post('payment', [PaymentController::class, 'online_checkout'])->name('Payment');

    Route::prefix('/admin')->group(function(){
            Route::get('/', [HomeAdminController::class,'index'])->name('admin');
            Route::prefix('/categories')->group(function(){

                Route::get('/', [CategoriesAdminController::class,'index'])->name('admin.categories');
                Route::get('/create', [CategoriesAdminController::class,'create'])->name('admin.categories.create');
                Route::get('/update/{id}',[CategoriesAdminController::class,'update'])->name('admin.categories.update');
                Route::get('/delete',[CategoriesAdminController::class,'delete'])->name('admin.categories.delete');
            });
            Route::prefix('/products')->group(function(){
                Route::get('/',[ProductControlller::class,'index'])->name('admin.products');
                Route::get('/create', [ProductControlller::class,'create'])->name('admin.products.create');
            });
            Route::prefix('/users')->group(function(){
                Route::get('/',[UserController::class,'index'])->name('admin.users');
                Route::get('/create',[UserController::class,'create'])->name('admin.users.create');
                Route::post('/create',[UserController::class,'store'])->name('admin.user.store');
                Route::get('/update/{id}',[UserController::class,'update'])->name('admin.user.update');


            });
    });
});
require __DIR__ . '/auth.php';
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('ProductDetail', [DetailCoffeController::class, 'show'])->name('ProductDetail');
Route::get('checkout',[CheckoutController::class,'index'])->name('CheckOut');
Route::get('AddToCart/{id}', [DetailCoffeController::class, 'AddToCart'])->name('AddToCart');
Route::get('deleteItem/{id}', [CheckoutController::class, 'deleteItemFromCart'])->name('deleteItem');
Route::get('forgot-password', function () {
    return view('ResetPassword');
})->name('ResetPassword');
Route::get('resetpassworded', function () {
    return view('ResetPasswordEmailed');
})->name('ResetPasswordEmailed');
Route::get('shipping', function () {
    return view('Shipping');
})->name('Shipping');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
