<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;

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

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('event.destroy');
Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::put('/event/{event}', [EventController::class, 'update'])->name('event.update');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::put('/Aprouve/{id}', [DashboardController::class, 'Update'])->name('Aprouve');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get("auth/{provide}", [SocialiteController::class, "redirectTo"]);
Route::get("auth/{provide}/callback", [SocialiteController::class, "handle"]);

Route::post("/checkout", [checkoutController::class, "checkout"]);
Route::put("/checkout/{id}/update", [checkoutController::class, "update"])->name("checkout.update");

Route::get('/admin', function () {
    return view("admin");
});

Route::get('settings', [SettingController::class, "index"]);
Route::put('/settings/update', [SettingController::class, "update"]);
Route::get('/settings/{id}', [SettingController::class, "show"]);
Route::resource("/category", CategorieController::class);


Route::get('/tik', function () {
    return view("ticket");
});
