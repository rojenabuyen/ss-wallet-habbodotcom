<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashoutController;
use App\Http\Controllers\HabboUserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\TransactionsController;
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

Route::get('', fn()=> to_route('users.index'));
Route::Resource('users', UserController::class);


Route::get('/users/{user}/transactions', [TransactionsController::class, 'index'])->name('transactions.index');

Route::get('login', fn()=> to_route('auth.create'))->name('login');

Route::get('reset', fn()=> to_route('reset.index'))->name('reset');

Route::resource('reset', PasswordController::class);

Route::resource('auth', AuthController::class)
    ->only('create', 'store', 'update', 'edit');
    
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
        ->name('auth.destroy');

Route::middleware('auth')->group(function () {
        Route::get('pay', fn()=> to_route('pay.index'));
        Route::resource('pay', PayController::class);   


        Route::resource('cashout', CashoutController::Class)
                ->only(['index','show']);

        Route::get('/cashout/{user}/view_cashout', [CashoutController::class, 'show'])->name('pay.view-cashout');


        });

