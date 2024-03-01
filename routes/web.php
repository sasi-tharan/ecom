<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubGroupController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

    //Admin  Home Slider Route
    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/delete', 'destroy');
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

// Admin Product Route
    Route::prefix('admin')->group(function () {
        Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    });

});
