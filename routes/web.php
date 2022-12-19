<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\JenisUangController;

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

Route::get('/', function() {return view('home');});

Route::get('/admin', [DashboardController::class, 'index']);

Route::resource('/admin/pemasukan', PemasukanController::class);

Route::resource('/admin/jenis-uang', JenisUangController::class);
