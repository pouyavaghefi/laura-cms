<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Settings\SiteInfoController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\AdminController;


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



/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class,'viewDetails'])->name('details');
        Route::patch('/', [ProfileController::class,'updateDetails'])->name('details.update');

        Route::patch('/avatar', [ProfileController::class,'uploadAvatar'])->name('details.update.avatar');
        Route::get('/avatar/display', [AdminController::class, 'showAvatar'])->name('details.show.avatar');
        Route::get('/avatar/remove', [ProfileController::class, 'deleteAvatar'])->name('details.delete.avatar');

        Route::patch('/password', [ProfileController::class,'changePassword'])->name('details.update.password');

        Route::get('/me', [ProfileController::class,'viewOwn'])->name('own');
        Route::get('/{id}', [ProfileController::class,'viewOthers'])->name('others');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::resource('/info', SiteInfoController::class);
    });

    Route::get('/logout', function () {
        Auth::logout();
        return Redirect('/');
    })->name('logout');
});

Route::prefix('login')->middleware('guest')->name('login.')->group(function () {
    Route::get('/', [LoginController::class,'showLoginForm'])->name('show');
    Route::post('/', [LoginController::class,'login'])->name('submit');
});



