<?php

use App\Models\Discount;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\GoogleController;
use App\Http\Controllers\User\FacebookController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('update_profile', [AdminController::class, 'updateProfile'])->name('update_profile');
    Route::get('update_password', [AdminController::class, 'updatePassword'])->name('update_password');
    Route::put('update_password', [AdminController::class, 'updatePassword'])->name('update_password');
    Route::get('/update-image', [AdminController::class, 'updateImage'])->name('update_image');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('users/login', [UserController::class, 'index'])->name('login');
Route::get('forget-password', [UserController::class, 'forgetPassword'])->name('forget-password');
Route::post('users/login', [UserController::class, 'login'])->name('user_login');
Route::post('users/register/success', [UserController::class, 'registerSuccess'])->name('user_register_attempt');
Route::get('users/register', [UserController::class, 'register'])->name('register_user');
Route::post('users/register/two', [UserController::class, 'registerTwo'])->name('user_register');
Route::get('users/register/two', [UserController::class, 'registerTwo'])->name('user_register');
Route::get('auth/facebook', [FacebookController::class, 'facebookPage'])->name('auth.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'facebookRedirect']);
Route::get('auth/google', [GoogleController::class, 'googlePage'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'googleRedirect']);



Route::post('users/dashboard', [UserController::class, 'goToTheDashboard'])->name('users.dashboard.post');
Route::get('users/dashboard', [UserController::class, 'goToTheDashboard'])->name('users.dashboard');

Route::get('users/dashboard/logout', [UserController::class, 'logout'])->name('users.logout');
Route::get('users/register/three', [UserController::class, 'registerThree'])->name('user_register_last');
Route::post('users/register/proceed', [UserController::class, 'registerProceed'])->name('user_register_proceed');
Route::post('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.index');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('admin/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('admin/vintage_obleka', [AdminController::class, 'vintage_obleka'])->name('admin.vintage_obleka');
Route::get('admin/product{product}/edit', [ProductsController::class, 'edit'])->name('edit_product');
Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
// Route::put('admin/profile/update', [AdminController::class, 'profileUpdate'])->name('update_profile');
Route::put('products/{id}/update', [ProductsController::class, 'update'])->name('update_product');


Route::get('admin/product/create', [ProductsController::class, 'create'])->name('create_product');
Route::post('admin/product', [ProductsController::class, 'store'])->name('store_product');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search_discount', [SearchController::class, 'searchDiscount'])->name('search_discount');
Route::get('/search_brand', [SearchController::class, 'searchBrand'])->name('search_brand');
Route::get('/admin/discount', [DiscountController::class, 'index'])->name('admin.discount');
Route::get('admin/{discount}/edit', [DiscountController::class, 'edit'])->name('edit_discount');
Route::put('admin/{discount}/update', [DiscountController::class, 'update'])->name('update_discount');
Route::get('admin/discount/create', [DiscountController::class, 'create'])->name('create_discount');
Route::post('admin/discount/store', [DiscountController::class, 'store'])->name('store_discount');

Route::get('admin/brand', [BrandController::class, 'index'])->name('admin.brand');
Route::get('/admin/brand/create', [BrandController::class, 'create'])->name('create_brand');
Route::get('admin/{brand}/brand/edit', [BrandController::class, 'edit'])->name('edit_brand');
Route::post('admin/brand/store', [BrandController::class, 'store'])->name('store_brand');
Route::put('admin/{brand}/brand/update', [BrandController::class, 'update'])->name('update_brand');
