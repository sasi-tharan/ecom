<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubGroupController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;

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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Route
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('admin.roles.index');
        Route::get('/roles/create', 'create')->name('admin.roles.create');
        Route::post('/roles', 'store')->name('admin.roles.store');
        Route::get('/roles/{role_id}/edit', 'edit')->name('admin.roles.edit');
        Route::put('/roles/{role_id}', 'update')->name('admin.roles.update');
        Route::delete('roles/{role_id}', 'destroy')->name('admin.roles.destroy');

    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('/users/{user_id}', 'update');
        Route::get('/users/{user_id}/delete', 'destroy');
    });

    //Admin Department Route
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('departments', 'index');
        Route::get('/departments/create', 'create');
        Route::post('/departments/create', 'store');
        Route::get('/departments/{department}/edit', 'edit');
        Route::put('/departments/{department}', 'update');
        Route::get('/departments/{department}/delete', 'destroy');
    });

    // Admin Group Route
    Route::controller(GroupController::class)->group(function () {
        Route::get('groups', 'index');
        Route::get('/groups/create', 'create')->name('admin.groups.create');
        Route::post('/groups/create', 'store')->name('admin.groups.store');
        Route::get('/groups/{group}/edit', 'edit')->name('admin.groups.edit');
        Route::put('/groups/{group}', 'update')->name('admin.groups.update');
        Route::get('/groups/{group}/delete', 'destroy');
    });

    // Admin Group Route
    Route::controller(SubGroupController::class)->group(function () {
        Route::get('subgroups', 'index');
        Route::get('/subgroups/create', 'create')->name('admin.subgroups.create');
        Route::post('/subgroups/create', 'store')->name('admin.subgroups.store');
        Route::get('/subgroups/{subgroup}/edit', 'edit')->name('admin.subgroups.edit');
        Route::put('/subgroups/{subgroup}', 'update')->name('admin.subgroups.update');
        Route::get('/subgroups/{subgroup}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders', 'index')->name('admin.sliders.index');
        Route::get('/sliders/create', 'create')->name('admin.sliders.create');
        Route::post('/sliders/create', 'store')->name('admin.sliders.store');
        Route::get('/sliders/{slider}/edit', 'edit')->name('admin.sliders.edit');
        Route::put('/sliders/{slider}', 'update')->name('admin.sliders.update');
        Route::get('/sliders/{slider}/delete', 'destroy')->name('admin.sliders.destroy');
    });

    Route::controller(BannerController::class)->group(function () {
        Route::get('banners', 'index')->name('admin.banners.index');
        Route::get('/banners/create', 'create')->name('admin.banners.create');
        Route::post('/banners/create', 'store')->name('admin.banners.store');
        Route::get('/banners/{banner}/edit', 'edit')->name('admin.banners.edit');
        Route::put('/banners/{banner}', 'update')->name('admin.banners.update');
        Route::get('/banners/{banner}/delete', 'destroy')->name('admin.banners.destroy');
    });

    // Admin Group Route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products.index'); // Define the index route
        Route::get('/products/create', 'create')->name('admin.products.create');
        Route::post('/products/create', 'store')->name('admin.products.store');
        Route::get('/products/{product}/edit', 'edit')->name('admin.products.edit');
    });



});
