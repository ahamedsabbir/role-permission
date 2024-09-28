<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Backend\CmsController;
use App\Http\Controllers\Web\Backend\PermissionController;
use App\Http\Controllers\Web\Backend\RoleController;
use App\Http\Controllers\Web\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
    Route::resource('cms', CmsController::class);
    //CMS routes end
});











require __DIR__ . '/auth.php';
