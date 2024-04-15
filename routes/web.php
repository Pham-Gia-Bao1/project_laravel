<?php

// use App\Http\Controllers\LoginController;

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\CategoriesAdminController;
use App\Http\Controllers\DetailCoffeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductControlller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
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
    Route::middleware('check.user.status')->group(function () {
        // Các route cần kiểm tra trạng thái của người dùng

        Route::get('profile_edit', [ProfileController::class, 'get_info_user'])->name('profile.edit'); // Đặt tên đặc biệt cho route
        Route::get('create_card', function () {
            return view('profile.Add-new-card');
        });
        Route::post('create_card', [ProfileController::class, 'create_card']);
        Route::get('profile', [ProfileController::class, 'index'])->name('Profile');

        Route::get('shipping', [ShippingController::class, 'index'])->name('Shipping');

        Route::get('/favourite/{product}', [FavoriteController::class, 'favorite'])->name('Favorite');
        Route::get('/favouriteList', [FavoriteController::class, 'viewAllFavoriteList'])->name('FavoriteList');
        Route::get('/deleteFavoriteProduct/{id}', [FavoriteController::class, 'removeFromFavorites'])->name('deleteFavoriteList');

        Route::post('profile', [ProfileController::class, 'edit_profile'])->name('Profile');

        Route::get('changeAvatar', function () {
            return view('profile.Edit_avatar');
        })->name('changeAvatar');

        Route::post('changeAvatar', [ProfileController::class, 'changeAvatar'])->name('changeAvatar');
        Route::get('payment', [PaymentController::class, 'index'])->name('Payment');
        Route::post('payment', [PaymentController::class, 'online_checkout'])->name('Payment');
        Route::get('checkout', [CheckoutController::class, 'index'])->name('CheckOut');
        Route::get('checkoutRefesh', [CheckoutController::class, 'refreshProducts'])->name('checkoutRefesh');
        Route::get('AddToCart', [DetailCoffeController::class, 'AddToCart'])->name('AddToCart');
        Route::get('deleteItem/{id}', [CheckoutController::class, 'deleteItemFromCart'])->name('deleteItem');

        Route::middleware('check.user.role')->group(function () {

            Route::prefix('/admin')->group(function () {
                Route::get('/contact-us', [ContactController::class, 'index'])->name('admin.contact');
                Route::patch('/contact-us/{id}', [ContactController::class, 'update'])->name('contacts.update');
                Route::get('/contact-us', [ContactController::class, 'index'])->name('admin.contact');
                Route::get('/', [HomeAdminController::class, 'index'])->name('admin');
                Route::prefix('/categories')->group(function () {

                    Route::get('/', [CategoriesAdminController::class, 'index'])->name('admin.categories');
                    Route::get('/create', [CategoriesAdminController::class, 'create'])->name('admin.categories.create');
                    Route::get('/update/{id}', [CategoriesAdminController::class, 'update'])->name('admin.categories.update');
                    Route::get('/delete', [CategoriesAdminController::class, 'delete'])->name('admin.categories.delete');
                });
                Route::prefix('/products')->group(function () {
                    Route::get('/', [ProductControlller::class, 'index'])->name('admin.products');
                    Route::get('/create', [ProductControlller::class, 'create'])->name('admin.product.create');
                    Route::post('/create', [ProductControlller::class, 'store'])->name('admin.product.store');
                    Route::get('/update/{id}', [ProductControlller::class, 'edit'])->name('admin.product.edit');
                    Route::PATCH('/update/{id}', [ProductControlller::class, 'update'])->name('admin.product.update');
                    Route::get('/delete/{id}', [ProductControlller::class, 'destroy'])->name('admin.product.delete');
                });

                Route::prefix('/users')->group(function () {
                    Route::get('/', [UserController::class, 'index'])->name('admin.users');
                    Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
                    Route::post('/create', [UserController::class, 'store'])->name('admin.user.store');
                    Route::get('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
                });
            });
        });
                Route::get('/', [CategoriesAdminController::class,'index'])->name('admin.categories');
                Route::get('/create', [CategoriesAdminController::class,'create'])->name('admin.categories.create');
                Route::get('/update/{id}',[CategoriesAdminController::class,'update'])->name('admin.categories.update');
                Route::get('/delete',[CategoriesAdminController::class,'delete'])->name('admin.categories.delete');
            });
            Route::prefix('/products')->group(function(){
                Route::get('/',[ProductControlller::class,'index'])->name('admin.products');
                Route::get('/create', [ProductControlller::class,'create'])->name('admin.product.create');
                Route::post('/create', [ProductControlller::class, 'store'])->name('admin.product.store');
                Route::get('/update/{id}', [ProductControlller::class, 'edit'])->name('admin.product.edit');
                Route::PATCH('/update/{id}', [ProductControlller::class, 'update'])->name('admin.product.update');
                Route::get( '/delete/{id}', [ProductControlller::class, 'destroy'])->name('admin.product.delete');
            });
            Route::prefix('/banner')->group(function(){
                Route::get('/',[BannerController::class,'index'])->name('admin.banner');
                // Route::get('/update/{id}',[BannerController::class,'update'])->name('admin.banner.update');
                Route::get('/update',[BannerController::class,'update'])->name('admin.banner.update');
                Route::post('/update',[BannerController::class,'store'])->name('admin.banner.store');
                // Route::post('/update',[BannerController::class,'store'])->name('admin.banner.store');
                // Route::post('/change',[BannerController::class,'changeBannerInDB'])->name('admin.banner.change');

            });
            Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
            Route::patch('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
            Route::get('/contact-us', [ContactController::class, 'create']);
            Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');
    });




require __DIR__ . '/auth.php';
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
Route::get('forgot-password', function () {
    return view('ResetPassword');
})->name('ResetPassword');
Route::get('ProductDetail', [DetailCoffeController::class, 'show'])->name('ProductDetail');
Route::get('resetpassworded', function () {
    return view('ResetPasswordEmailed');
})->name('ResetPasswordEmailed');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
Route::get('/blocked', function () {
    return view('BlockedPage');
})->name('BlockedPage');

Route::get('/test', function () {
    return view('components.side_bar');
});
