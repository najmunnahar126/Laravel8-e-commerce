<?php

use App\Http\Livewire\Homecomponent;
use App\Http\Livewire\Shopcomponent;
use App\Http\Livewire\Cartcomponent;
use App\Http\Livewire\Checkoutcomponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Homecomponent::class);
Route::get('/shop', Shopcomponent::class);
Route::get('/cart', Cartcomponent::class);
Route::get('/checkout', Checkoutcomponent::class);