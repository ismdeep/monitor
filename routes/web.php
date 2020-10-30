<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusAPIController;
use App\Http\Controllers\SettingController;

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
    return view('home');
})->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'doLoginPost']);
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [AuthController::class, 'doRegisterPost']);
Route::get('/logout', [AuthController::class, 'doLogout'])->name('logout');

Route::get('/status/json', [StatusController::class, 'status_json'])->middleware('auth');
Route::get('/status/{id}', [StatusController::class, 'status_detail'])->middleware('auth');
Route::get('/status', [StatusController::class, 'homePage'])->middleware('auth');
Route::get('/settings', [SettingController::class, 'settings_page'])->middleware('auth')->name('settings');
Route::get('/settings/tokens', [SettingController::class, 'personal_access_tokens_page'])->middleware('auth')->name('tokens');
Route::get('/settings/tokens/new', [SettingController::class, 'generate_personal_access_token_page'])->middleware('auth');
Route::post('/settings/tokens/new', [SettingController::class, 'generate_personal_access_token_post'])->middleware('auth');


Route::post('/api/status', [StatusAPIController::class, 'update_status']);

