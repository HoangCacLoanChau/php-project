<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
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
// [ controller, name of method of class]
Route::get('/shopping', [CarController::class, 'viewCar'])->name('car.list');
Route::get('/', [CarController::class, 'viewCarHomepage'])->name('home');
//User Routes
Route::get('/login', [UserController::class, 'viewLogin'])->name('login.view');
Route::post('/login', [UserController::class, 'login'])->name('login.action');
Route::get('register', [UserController::class, 'viewRegister'])->name('register.view');
Route::post('/register', [UserController::class, 'register'])->name('register.action');
Route::post('/logout', [UserController::class, 'logout']);
//admin
Route::middleware(['auth', 'checkadmin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [UserController::class, 'viewAdmin'])->name('admin.view');
        Route::get('/handle-car', [CarController::class, 'handleCar'])->name('handle.car');
        Route::get('/edit-car/{car}', [CarController::class, 'showEditScreen'])->name('show.edit');
        Route::put('/edit-car/{car}', [CarController::class, 'updateCar'])->name('update.car');
        Route::post('/create-car', [CarController::class, 'createCar'])->name('create.car');
    });
//Car
Route::get('/detail-car/{id}', [CarController::class, 'detailCar'])->name('detail.car');
//Cart
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/add-cart/{id}', [CartController::class, 'addCart'])->name('add.cart');
    Route::get('/increase-quantity/{id}', [CartController::class, 'increaseQuantity'])->name('increase.quantity');
    Route::get('/decrease-quantity/{id}', [CartController::class, 'decreaseQuantity'])->name('decrease.quantity');
    Route::get('/remove/{id}', [CartController::class, 'removeCart'])->name('remove.cart');
    Route::get('/clear', [CartController::class, 'clearCart'])->name('clear.cart');
    //car
    Route::delete('/delete-car/{car}', [CarController::class, 'deleteCar'])->name('delete.car');
});
