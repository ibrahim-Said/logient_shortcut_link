<?php

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

Route::get('/', function () {
    return view('layouts.backend');
});
Auth::routes();
Route::get('/', [ShortcutLinkController::class, 'index'])->name('home');
Route::resource('shortcut-links', ShortcutLinkController::class);
Route::post('shortcut-links/getAll', [ShortcutLinkController::class, 'getAll'])->name('shortcut-links.getAll');
Route::get('/{uuid}', [ShortcutLinkController::class, 'redirect'])->name('shortcut-links.redirect');

