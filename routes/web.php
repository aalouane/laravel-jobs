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
Route::controller(ListingController::class)->group(function(){
    Route::get('/', 'index')->name('listings.index');
    Route::get('/listings/create', 'create')->name('listings.create')->middleware('auth');
    Route::post('/listings/store', 'store')->name('listings.store')->middleware('auth');;
    Route::get('/listings/{id}', 'show')->name('listings.show')->where('id', '[0-9]+');
    Route::get('/listings/{listing}/edit', 'edit')->name('listings.edit')->middleware('auth');;
    Route::put('/listings/{listing}/update', 'update')->name('listings.update')->middleware('auth');;
    Route::delete('/listings/{listing}', 'destroy')->name('listings.destroy')->middleware('auth');;
    Route::get('/listings/manage', 'manage')->name('listings.manage')->middleware('auth');;
});


Route::controller(UserController::class)->group(function(){
    Route::get('/register', 'create');
    Route::post('/user/store', 'store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authentication', 'authentication');
    Route::get('/logout', 'logout')->middleware('auth');;
});
