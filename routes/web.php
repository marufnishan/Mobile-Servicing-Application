<?php

//use App\Http\Controllers\Livewire\UserController;

use App\Http\Controllers\PdfController;
use App\Http\Livewire\NoticeboardController;
use App\Http\Livewire\UserController;
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

Route::get('/', function () {
    return view('welcome');
});







Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::post('/userinfo', [UserController::class, 'store'])->name('userinfo');
    Route::get('/allnotice', App\Http\Livewire\ShowNoticeController::class)->name('allnotice');
});

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/edit/{user_id}', App\Http\Livewire\UserEditController::class)->name('edit');
    Route::put('/update', App\Http\Livewire\UserEditController::class)->name('update');
    Route::get('/all_users' , App\Http\Livewire\UserController::class)->name('allusers');
    Route::get('/generate-pdf', [PdfController::class, 'generatePDF'])->name('getpdf');
    Route::get('/generate-invoice/{user_id}', [PdfController::class, 'invoice'])->name('getinvoice');
    Route::get('/notice', App\Http\Livewire\NoticeboardController::class)->name('notice');
    Route::post('/addnotice', [NoticeboardController::class, 'store'])->name('addnotice');
});
