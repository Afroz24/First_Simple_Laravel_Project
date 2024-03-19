<?php

use App\Http\Controllers\LaptopController;
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

// first below route gets called
Route::any('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/','home')->name('home');

Route::get('/create',[LaptopController::class,'homefun'])->name('createform')->middleware('auth');

Route::post('/create',[LaptopController::class,'store'])->name('store')->middleware('auth');

//now iam getting whole data from database by using below route
Route::get('/view', [LaptopController::class, 'getfun'])->name('viewpage');

//now when user clicks edit button he goes through this route and calls function
Route::get('/edit/{id}', [LaptopController::class, 'editfun'])->name('editform')->middleware('auth');




Route::prefix('admin')->middleware('auth')->group(function () {

    //now iam creating route for update when user clicks update button so control comes to this below route
    Route::put('/update/{id}', [LaptopController::class, 'updatefun'])->name('updatepage');

    //now im creting delete route , when user clicks delete button so control comes to this below route and executes the function
    Route::delete('/delete/{laptop}', [LaptopController::class, 'deletefun'])->name('deletepage');

});


// Route::prefix('admin')->middleware('auth')->group(function(){



//     Route::put('/update/{bike}',[BikeController::class,'update'])->name('update');


//     Route::delete('/delete/{bike}',[BikeController::class,'delete'])->name('delete');



//    });


//These are Authentication routes Mentioned below

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
