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
});

Route::get('restaurants/{restaurant}', function (User $restaurant) {
    return new RestaurantResource(User::find($restaurant));
});


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
