<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});
Route::redirect('/home', '/');

Auth::routes();

Route::middleware(['web'])
    ->group(function () {
        Route::auth();

        //Admin Routen
        Route::name('admin.')->group(function () {
            Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

            Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login');
            Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'index'])->name('login');

            Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminLogoutController::class, 'logout'])->name('logout');
        });

        // Angestellten Routen
        Route::name('employee.')->group(function () {
            // Routen um einen Angestellten zu erstellen
            Route::post('add-angestellter', [App\Http\Controllers\AngestellterController::class, 'store'])->name('store');
        });

        //Termin Routen
        Route::name('termin.')->group(function () {
            // Route um einen Termin zu löschen
            Route::get('delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');

            // Route um einen Termin zu bearbeiten
            Route::get('edit/{id}', [App\Http\Controllers\AdminController::class, 'create'])->name('create');
            Route::post('edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
        });
    });
