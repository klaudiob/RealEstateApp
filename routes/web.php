<?php

use App\Http\Controllers\PropertyController;
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

Route::get('/', [PropertyController::class, 'index'])->name('properties.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>['auth']],function (){
    Route::post('properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('properties/create', [PropertyController::class, 'create'])->name('properties.create')->middleware('host');
    Route::put('properties/{property}', [PropertyController::class, 'update'])->name('properties.update')->middleware('host');
    Route::delete('properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy')->middleware('host');
    Route::get('properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit')->middleware('host');
    Route::get('user/properties', [PropertyController::class, 'getPropertiesByUser'])->name('properties.user')->middleware('host');
    Route::get('properties/{property}/reservation', [PropertyController::class, 'createReservation'])->name('properties.reservation')->middleware('simpleUser');
    Route::post('properties/{property}', [PropertyController::class, 'book'])->name('properties.book')->middleware('simpleUser');
});




Route::get('properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

