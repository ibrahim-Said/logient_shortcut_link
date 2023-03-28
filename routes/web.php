<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\LocaleController;
use App\Http\Controllers\Admin\ShortcutLinkController;
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

Route::group([
    "middleware"=>["setLocale","activityLog"]
],function(){
    Auth::routes();
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
    Route::post('activity-logs/getAll', [ActivityLogController::class, 'getAll'])->name('activity-logs.getAll');
    Route::get('/', [ShortcutLinkController::class, 'index'])->name('home');
    Route::get('/home', [ShortcutLinkController::class, 'index']);
    Route::resource('shortcut-links', ShortcutLinkController::class);
    Route::get('/locale/{locale}', [LocaleController::class, 'setLocale'])->name('locale.set');
    Route::post('shortcut-links/getAll', [ShortcutLinkController::class, 'getAll'])->name('shortcut-links.getAll');
    Route::get('/{uuid}', [ShortcutLinkController::class, 'redirect'])->name('shortcut-links.redirect');
});

