<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopupUserController;
use App\Http\Controllers\TopTopupUserController;

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
Route::get('/',[TopTopupUserController::class,'index'])->name('top.users');
Route::post('generate-topups',[TopupUserController::class,'topTopup'])->name('topup.users');