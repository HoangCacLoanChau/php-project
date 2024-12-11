<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    // $carList = Car::where('user_id', auth()->id())->get();
    $carList = [];
    if (auth()->check()) {
        $carList = auth()->user()->usersCar()->latest()->get();
    }else{
        $carList = Car::all();
    }
    return view('home', ['cars' => $carList]);
});
// [ controller, name of method of class]
//User Routes
Route::post('/create', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//Car Routes
Route::post('/create-car', [CarController::class, 'createCar']);
Route::get('/edit-car/{car}', [CarController::class, 'showEditScreen']);
Route::put('/edit-car/{car}', [CarController::class, 'updateCar']);
Route::delete('/delete-car/{car}', [CarController::class, 'deleteCar']);
