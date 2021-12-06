<?php

use App\Http\Controllers\API\Admin\SubscriptionController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\MetaController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\UserController;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\SettingsController;

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
//    return redirect(route('register'));
    return Inertia::render('Welcome');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('settings', SettingsController::class);
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('subscription', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::get('subscription/create', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::get('subscription/show', [PaymentController::class, 'index'])->name('payments.show');
    Route::get('requests/show', [MetaController::class, 'showRequests'])->name('requests.show');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('subscription/start', [PaymentController::class, 'store'])->name('subscription.start');
});
