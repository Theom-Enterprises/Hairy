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

Route::get('/', static function () {
    return view('index');
})->name('home');
Route::redirect('/home', '/');

Auth::routes();

Route::auth();

//Admin Routen
Route::name('admin.')->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth.employee')->name('home');

    Route::middleware(['employee.authenticated', 'user.logout'])->group(function () {
        Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login');
        Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'index'])->name('login');
    });

    Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminLogoutController::class, 'logout'])->middleware('auth.employee')->name('logout');
});

Route::middleware('auth.employee')->group(function () {
    // Angestellten Routen
    Route::name('employee.')->group(function () {
        // Routen um einen Angestellten zu erstellen
        Route::post('add-angestellter', [App\Http\Controllers\AngestellterController::class, 'store'])->name('store');

        Route::post('update-angestellter/{angestellter_id}', [App\Http\Controllers\AngestellterController::class, 'update'])->name('update');
        Route::post('delete-angestellter/{angestellter_id}', [App\Http\Controllers\AngestellterController::class, 'delete'])->name('delete');
    });

    //Termin Routen
    Route::name('termin.')->group(function () {
        // Route um einen Termin zu löschen
        Route::post('delete-termin/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');

        // Route um einen Termin zu bearbeiten
        Route::get('update-termin/{id}', [App\Http\Controllers\AdminController::class, 'create'])->name('create');
        Route::post('update-termin/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
    });

    //Angebot Routen
    Route::name('angebot.')->group(function () {
        // Route um ein Angebot zu löschen
        Route::post('delete-angebot/{angebot_id}', [App\Http\Controllers\AngebotController::class, 'delete'])->name('delete');

        // Route um ein Angebot zu erstellen
        Route::get('add-angebot', [App\Http\Controllers\AngebotController::class, 'store'])->name('store');
        Route::post('add-angebot', [App\Http\Controllers\AngebotController::class, 'store'])->name('store');

        // Route um ein Angebot zu bearbeiten
        Route::post('update-angebot/{angebot_id}', [App\Http\Controllers\AngebotController::class, 'update'])->name('update');
    });
});


Route::middleware('auth.user')->group(function () {
    // Terminbuchung Routen
    Route::get('/terminbuchung', [App\Http\Controllers\TerminController::class, 'index'])->name('terminbuchung');
    Route::post('/terminbuchung', [App\Http\Controllers\TerminController::class, 'store'])->name('terminbuchung');

    //Angebot Routen
    Route::name('angebot.')->group(function () {
        //Angebote anzeigen
        Route::get('/angebot', [App\Http\Controllers\AngebotController::class, 'index'])->name('show');
    });

    //Profil Routen
    Route::name('profil.')->group(function () {
        //Profil Anzeigen
        Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('show');

        //Profil Löschen
        Route::post('/profil/delete/{user_id}', [App\Http\Controllers\ProfilController::class, 'delete'])->name('delete');

        //Profil Aktualisieren
        Route::post('/profil/update/{user_id}', [App\Http\Controllers\ProfilController::class, 'update'])->name('update');
    });
});

Route::middleware(['user.authenticated', 'employee.logout'])->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
});
