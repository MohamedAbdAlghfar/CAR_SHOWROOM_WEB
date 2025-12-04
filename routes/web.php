<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\Admin\CarLogsController;
use App\Http\Controllers\User\viewCarsController;
use App\Http\Controllers\User\EditProfileController;
use App\Http\Controllers\Admin\{DashboardController,CreateUserController,CreateAdminController,DeleteUserController,DeleteAdminController,EditUserController,EditAdminController,ShowOrdersController,CreateCarController,EditCarController,DeleteCarController};

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
    return view('welcome');
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});

require __DIR__.'/auth.php';

// user side 
Route::middleware('auth')->group(function () { 
Route::get('user/viewCars/{brand}', [viewCarsController::class, 'show'])->name('viewCars.show');
Route::get('user/editProfile', [EditProfileController::class, 'edit'])->name('EditProfile.edit'); 
Route::put('user/updateProfile', [EditProfileController::class, 'update'])->name('EditProfile.update'); 
Route::get('user/buy/{car_id}', [PaymentController::class, 'pay'])->name('Payment.pay');
Route::get('user/paymob/callback', [PaymentController::class, 'callback']); 
});



// admin side 
Route::middleware('auth')->group(function () {
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');  
Route::get('admin/createUser', [CreateUserController::class, 'create'])->name('createUser.create');
Route::post('admin/storeUser', [CreateUserController::class, 'store'])->name('createUser.store');
Route::get('admin/createAdmin', [CreateAdminController::class, 'create'])->name('createAdmin.create'); 
Route::post('admin/storeAdmin', [CreateAdminController::class, 'store'])->name('createAdmin.store');  
Route::get('admin/deleteUser', [DeleteUserController::class, 'delete'])->name('deleteUser.delete');
Route::delete('admin/destroyUser/{user_id}', [DeleteUserController::class, 'destroy'])->name('destroyUser.destroy');
Route::get('admin/deleteAdmin', [DeleteAdminController::class, 'delete'])->name('deleteAdmin.delete'); 
Route::delete('admin/destroyAdmin/{admin_id}', [DeleteAdminController::class, 'destroy'])->name('destroyAdmin.destroy');
Route::get('admin/editUsers', [EditUserController::class, 'index'])->name('editUsers.index');
Route::put('admin/editUser/{user_id}', [EditUserController::class, 'edit'])->name('editUser.edit');
Route::put('admin/updateUser/{user_id}', [EditUserController::class, 'update'])->name('updateUser.update');
Route::get('admin/editAdmins', [EditAdminController::class, 'index'])->name('editAdmins.index');
Route::put('admin/editAdmin/{user_id}', [EditAdminController::class, 'edit'])->name('editAdmin.edit');
Route::put('admin/updateAdmin/{user_id}', [EditAdminController::class, 'update'])->name('updateAdmin.update');
Route::get('admin/showOrders', [ShowOrdersController::class, 'show'])->name('showOrders.show');
Route::get('admin/createCar', [CreateCarController::class, 'create'])->name('createCar.create');
Route::post('admin/createCar', [CreateCarController::class, 'store'])->name('createCar.store');
Route::get('admin/editCars', [EditCarController::class, 'index'])->name('editCars.index'); 
Route::get('admin/editCar/{car_id}', [EditCarController::class, 'edit'])->name('editCar.edit');  
Route::put('admin/updateCar/{car_id}', [EditCarController::class, 'update'])->name('updateCar.update'); 
Route::get('admin/deleteCar', [DeleteCarController::class, 'delete'])->name('deleteCar.delete');
Route::delete('admin/destroyCar/{car_id}', [DeleteCarController::class, 'destroy'])->name('destroyCar.destroy');
Route::get('admin/CarLogs', [CarLogsController::class, 'showLogs'])->name('CarLogs');
});