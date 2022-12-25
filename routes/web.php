<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

/*

GET	        /photos	                index	photos.index
GET	        /photos/create	        create	photos.create
POST	    /photos	                store	photos.store
GET	        /photos/{photo}	        show	photos.show
GET	        /photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	        update	photos.update
DELETE	    /photos/{photo}	        destroy	photos.destroy

*/
Route::get('/', [ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::get('/listings/{id}', [ListingController::class, 'show'])->name('listings.show');
Route::post('/listings/store', [ListingController::class, 'store'])->name('listings.store');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
Route::put('/listings/{listing}/update', [ListingController::class, 'update'])->name('listings.update');
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');
// Route::get('/', [ListingController::class, '']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/authentication', [UserController::class, 'authentication']);
