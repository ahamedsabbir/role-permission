<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Backend\CategoryController;

use App\Http\Controllers\Web\Backend\Authorization\PermissionController;
use App\Http\Controllers\Web\Backend\Authorization\RoleController;
use App\Http\Controllers\Web\Backend\Authorization\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.layouts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //role-permition routes start 
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('user', UserController::class);
    //role-permition routes end

    //CMS routes start
    
    //CMS routes end

    //Category routes start
    
    //Category routes end
});



Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::patch('/status/{id}', 'status')->name('status');
});







require __DIR__ . '/auth.php';
