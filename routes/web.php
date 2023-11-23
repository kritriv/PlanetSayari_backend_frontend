<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;

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
//     return view('/index');    
// });

Route::group(['Middleware'=>'guest'], function(){
    Route::post('/dashboard', [AuthController::class, 'loginStore'])->name('dashboard');
    Route::post('/', [AuthController::class, 'registerStore'])->name('register');
});

Route::group(['Middleware'=>'auth'], function(){
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);    
    Route::delete('/', [AuthController::class, 'logout'])->name('logout');
});


//User Dashboard Routes
Route::get('/request-deal', [DashboardController::class, 'requestDeal']);
Route::post('/request-deal', [DashboardController::class, 'requestDealStore']);

Route::get('/deal-status', [DashboardController::class, 'statusDeal']);
Route::get('/delete/{id}', [DashboardController::class, 'deleteStatusDeal']);

// Route::get('/deal-status', function(){
//     return view('/deal-status');
// });

Route::get('help-contact', [DashboardController::class, 'helpContact']);
Route::post('help-contact', [DashboardController::class, 'helpContactStore']);

Route::get('/user-profile', [DashboardController::class, 'userprofile'])->name('user-profile');
Route::put('/user-profile', [DashboardController::class, 'userprofile_Update'])->name('update-profile');
// Route::put('/user-profile', [DashboardController::class, 'password_Update'])->name('update-profile-password');

// User Dashboard Route End

// Admin Dashboard Route Start
Route::group(['Middleware'=>'guest'], function(){
    Route::post('/ps-admin', [AdminController::class, 'Adminlogin'])->name('admin-login');
});
Route::group(['Middleware'=>'auth'], function(){
    Route::get('/ps-admin', [AdminController::class, 'PlanetAdminLogin']);
});

Route::get('/ps-register', [AdminController::class, 'registerView']);
Route::post('/ps-register', [AdminController::class, 'AdminRegisterStore'])->name('admin-register');


Route::get('/admin-dashboard', function (){
    return view('admin-dashboard');
});
Route::get('/admin-profile', function (){
    return view('admin-profile');
});
// Route::get('/broker-request-view', function (){
//     return view('admin-broker-request');
// });

Route::get('/investor-request-view', [AdminController::class, 'AdminInvestorRequest']);
Route::get('/broker-request-view', [AdminController::class, 'AdminBrokerRequest']);
Route::get('/admin-investor-data', [AdminController::class, 'AdminInvestorData']);
Route::get('/admin-broker-data', [AdminController::class, 'AdminBrokerData']);
Route::get('/admin-user-query', [AdminController::class, 'UserFormData']);
Route::get('/view-investor-data/{username}',[AdminController::class, 'userData']);

// Route::get('/investor-request-view', function (){
//     return view('admin-investor-request');
// });

// Route::get('/admin-investor-data', function (){
//     return view('admin-investor-data');
// });

// Route::get('/admin-broker-data', function (){
//     return view('admin-broker-data');
// });

// Route::get('/admin-user-query', function (){
//     return view('admin-user-query');
// });
Route::get('/admin-website-contact', function (){
    return view('admin-website-contact');
});

// Admin Dashborad Route End


Route::get('/contact', function () {
    return view('/contact');
    
});
Route::get('/programs', function () {
    return view('/programs');
   
});
Route::get('/projects', function () {
    return view('/projects');
    
});
Route::get('/strategy', function () {
    return view('/strategy');
   
});
Route::get('/letter-of-credit', function () {
    return view('/letter-of-credit');
   
});
Route::get('/funds-assets', function () {
    return view('/funds-assets');
   
});
Route::get('/sayari-app', function () {
    return view('/sayari-app');
    
});
Route::get('/our-journey', function () {
    return view('/our-journey');  
});

Route::get('/sayari-app', function () {
    return view('/sayari-app');
    
});
Route::get('/mission', function(){
    return view('/mission');

});
Route::get('/our-Program', function(){
    return view('/programs');
});
Route::get('/project', function(){
    return view('/projects');
});
Route::get('/instrument', function(){
    return view('/instrument');
});
Route::get('/letter-of-credit', function(){
    return view('/letter-of-credit');
});

