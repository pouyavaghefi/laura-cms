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
use App\Http\Controllers\Admin\Menu\MenuController;
use App\Http\Controllers\Admin\Menu\SubsetController;


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

    Route::prefix('menus')->name('menus.')->group(function () {
        Route::get('/', [MenuController::class,'index'])->name('index');
        Route::get('/create', [MenuController::class,'create'])->name('create');
        Route::post('/create', [MenuController::class,'store'])->name('store');
        Route::get('/{menu}/edit', [MenuController::class,'edit'])->name('edit');
        Route::patch('/{menu}/update', [MenuController::class,'update'])->name('update');
        Route::delete('/{menu}/remove', [MenuController::class,'destroy'])->name('delete');

        Route::prefix('/{menuId}/subsets')->group(function () {
            Route::get('/', [SubsetController::class, 'viewSubsets'])->name('subsets');
            Route::get('/create', [SubsetController::class, 'createSubsets'])->name('subsets.create');
            Route::post('/create', [SubsetController::class, 'storeSubsets'])->name('subsets.store');
            Route::get('/edit/{linkId}', [SubsetController::class, 'editSubsets'])->name('subsets.edit');
            Route::patch('/update/{linkId}', [SubsetController::class, 'updateSubsets'])->name('subsets.update');
            Route::delete('/remove/{linkId}', [SubsetController::class, 'destroySubsets'])->name('subsets.delete');
        });

        Route::get('/change-subset-status', [SubsetController::class, 'changeSubsetStatus']);
        Route::post('/change-subset-priority/{id}', [SubsetController::class, 'changeSubsetPriority'])->name('change.subset.priority');
        Route::post('/change-subset-priority/{id}', [SubsetController::class, 'changeSubsetPriority'])->name('change.subset.priority');
    });

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



