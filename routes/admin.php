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
use App\Http\Controllers\Admin\Member\MemberController;
use App\Http\Controllers\Admin\Member\MemberAdminController;
use App\Http\Controllers\Admin\Member\UserManagementController;
use App\Http\Controllers\Admin\Profile\AvatarController;
use App\Http\Controllers\Admin\Media\MediaLibraryController;
use App\Http\Controllers\Admin\Programmer\ErrorLogController;


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

        Route::patch('/avatar', [AvatarController::class,'uploadAvatar'])->name('details.update.avatar');
        Route::get('/avatar/display', [AvatarController::class, 'showAvatar'])->name('details.show.avatar');
        Route::get('/avatar/remove', [AvatarController::class, 'deleteAvatar'])->name('details.delete.avatar');

        Route::patch('/password', [ProfileController::class,'changePassword'])->name('details.update.password');

        Route::get('/me', [ProfileController::class,'viewOwn'])->name('own');
        Route::get('/{uname}', [ProfileController::class,'viewOthers'])->name('others');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::resource('/info', SiteInfoController::class);
    });

    Route::prefix('members')->name('members.')->group(function () {
        Route::resource('/', MemberController::class);
        Route::resource('/admins', MemberAdminController::class);

        Route::post('/change-activation', [UserManagementController::class, 'changeActivation']);

        Route::prefix('media')->name('add.')->group(function () {
            Route::get('/add', [UserManagementController::class, 'addMemberView'])->name('view');
            Route::post('/add', [UserManagementController::class, 'addMemberProcess'])->name('process');
        });
    });

    Route::prefix('media')->name('media.')->group(function () {
        Route::get('/', [MediaLibraryController::class,'index'])->name('library');
        Route::get('/upload', [MediaLibraryController::class,'upload'])->name('upload');
        Route::post('/upload', [MediaLibraryController::class,'submitUpload'])->name('upload.submit');
        Route::delete('/{id}', [MediaLibraryController::class,'destroyFile'])->name('delete');
    });

    Route::prefix('error')->name('error.')->group(function () {
        Route::get('/log', [ErrorLogController::class, 'index'])->name('log');
        Route::get('/info/{id}', [ErrorLogController::class, 'info'])->name('info');

        Route::post('/remove_star', [ErrorLogController::class, 'removeStar'])->name('removeStar');
        Route::get('/make_star/{id}', [ErrorLogController::class, 'makeStar'])->name('makeStar');

        Route::prefix('delete')->name('delete')->group(function () {
            Route::delete('/{id}', [ErrorLogController::class, 'destroy']);
            Route::get('/all', [ErrorLogController::class, 'destroyAll'])->name('.all');
            Route::get('/all_except_stars', [ErrorLogController::class, 'destroyAllExceptStars'])->name('.all.exceptStars');
        });
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



