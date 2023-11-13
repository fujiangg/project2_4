<?php

use App\Http\Controllers\ConfigurationStatusNameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TestedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstalledController;
use App\Http\Controllers\ConfiguredController;
use App\Http\Controllers\DetailLogsController;
use App\Http\Controllers\UnconfiguredController;
use App\Http\Controllers\PreconfiguredController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ItemNameController;
use App\Http\Controllers\logActivityController;
use App\Http\Controllers\ManufacturerNameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

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
    return view('welcome');
});

// memanggil controller (LoginController) -> menjalankan method 'login' -> method memanggil view -> view menampilkan form login
Route::get('/login', 'LoginController@login')->name('login');

// forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgotPassword'])->name('forget.password.post'); 

// reset password
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset.password.post');

// mengirim data login (username, password) saat tombol 'login' diklik
Route::post('actionlogin', 'LoginController@actionlogin')->name('actionlogin');

// Auth::routes();

// memanggil controller (HomeController) -> menjalankan method 'home' -> method memanggil view -> view menampilkan halaman home
// auth digunakan agar halaman home hanya bisa diakses ketika sudah login
Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

Route::get('profiles', 'UserProfileController@index')->name('profiles')->middleware('auth');

Route::get('profiles', 'UserProfileController@edit')->name('profiles.edit')->middleware('auth');

Route::patch('profiles', 'UserProfileController@update')->name('profiles.update')->middleware('auth');

Route::post('profiles', 'UserProfileController@upload')->name('profiles.upload')->middleware('auth');

Route::get('items/{item}/log', [ItemController::class, 'log'])->name('items.log');
// Route::get('items/{id}/log', [ItemController::class, 'log'])->name('item.log');

Route::delete('items/{id}/destroy', [ItemController::class, 'destroy'])->name('destroy');

Route::get('items/trash', [ItemController::class, 'trash'])->name('items.trash');
Route::get('items/(item)/trash', [DetailLogsController::class, 'log'])->name('items.trash.log');
Route::post('items/{id}/restore', [ItemController::class, 'restore'])->name('items.restore');

Route::resource('item-names', ItemNameController::class)->middleware('auth');
Route::resource('manufacturer-names', ManufacturerNameController::class)->middleware('auth');
Route::resource('configurationStatus-names', ConfigurationStatusNameController::class)->middleware('auth');

Route::resource('items', ItemController::class)->middleware('auth');;

Route::resource('unconfigureds', UnconfiguredController::class)->middleware('auth');;

Route::resource('preconfigureds', PreconfiguredController::class)->middleware('auth');;

Route::resource('configureds', ConfiguredController::class)->middleware('auth');;

Route::resource('testeds', TestedController::class)->middleware('auth');;

Route::resource('installeds', InstalledController::class)->middleware('auth');;

// Route::get('logs', 'logActivityController@index')->name('logs')->middleware('auth');
Route::resource('logs', logActivityController::class);
Route::get('logs-user', [UserController::class, 'index'])->name('logs-user');

// mengirim aksi ketika tombol 'logout' di klik 
// auth digunakan agar perintah logout hanya bisa diakses ketika sudah login
Route::get('actionlogout', 'LoginController@actionlogout')->name('actionlogout')->middleware('auth');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
