<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\RestaurantResource;
use App\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('plates', PlateController::class);
    Route::resource('orders', OrderController::class);
    Route::get('stats', 'HomeController@stats')->name('stats');
});



Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/paysuccess', function(){
    return view('guest.paysuccess');
})->name('guest.paysuccess');


Route::get('/{any}', function () {

    return view('welcome');
})->where('any', '.*');

