<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/tickets/index', [HomeController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'index'])->name('tickets.create');
    Route::post('/store/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::post('/delete/tickets/{id}', [TicketController::class, 'delete'])->name('tickets.delete');
});