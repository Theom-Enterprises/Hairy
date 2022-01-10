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

Route::domain(env('APP_URL'))
    ->group(function () {
        Route::get('/', function () {
            return view('index');
        });
    });

Auth::routes();

Route::middleware(['web'])
    ->name('admin.')
    ->group(function () {
        Route::auth();
        Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

        Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login');
        Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'index'])->name('login');

        Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminLogoutController::class, 'logout'])->name('logout');

        // Routen um einen Angestellten zu erstellen
        Route::get('add-angestellter', [App\Http\Controllers\AngestellterController::class, 'create']);
        Route::post('add-angestellter', [App\Http\Controllers\AngestellterController::class, 'store']);

        // Route um einen Termin zu löschen
        Route::get('delete/{id}', '\App\Http\Controllers\AdminController@delete');

        // Route um einen Termin zu aktualisieren
        Route::get('edit/{id}', '\App\Http\Controllers\AdminController@create');
        Route::post('edit/{id}', '\App\Http\Controllers\AdminController@edit');
    });
