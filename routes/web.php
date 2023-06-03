<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupplierController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function(){
    return view('home');
})->name('home.index');

Route::middleware(['auth', 'auth_admin'])->group(function(){
    Route::get('suppliers',[SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('new/supplier',[SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('store/supplier',[SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('delete/supplier',[SupplierController::class, 'destroy'])->name('suppliers.delete');
});

require __DIR__.'/auth.php';
