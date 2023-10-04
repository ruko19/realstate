<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// User Frontend all routes
Route::get('/', [UserController::class, 'index'])->name('user.index');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {

    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'userProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('/user/update/password', [UserController::class, 'userUpdatePassword'])->name('user.update.password');
});

require __DIR__ . '/auth.php';

//   Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');


    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');


    Route::post('/admin/profile', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');
});


Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});



Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');


//   Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Property Type all Route
    Route::controller(PropertyTypeController::class)->group(function () {

        Route::get('/all/type', 'alltype')->name('all.type');
        Route::get('/add/type', 'addtype')->name('add.type');
        Route::post('/store/type', 'storeType')->name('store.type');
    });
});
