<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::view("/about", "about");

Route::get("/", [HomepageController::class,"index"]);

Route::get("/contact", [ContactController::class,"index"]);
Route::post("/send-message", [ContactController::class,"sendMessage"]);

Route::post("/add-product", [ProductsController::class,"addProduct"])->name('addProduct');

Route::get("/shop", [ShopController::class,"index"]);



///ADMIN
Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () { 

    Route::controller(ContactController::class)->prefix('/contacts')->group(function () {
        Route::get("/all", "getAllContacts")->name("allContacts");
        Route::get("/delete/{contact}", "delete")->name("deleteContact");
        Route::get("/edit-form/{contact}", "editView")->name("editContactView");
        Route::post("/edit", "edit")->name("editContact");
    });

   
    Route::controller(ProductsController::class)->prefix('products')->group(function () { 
        Route::get("/all", "index")->name("allProducts");
        Route::get("/delete/{product}", "delete")->name("deleteProduct");
        Route::get("/edit/{product}", "editView")->name("editProductView");
        Route::post("/edit/{product}", "edit")->name("editProduct");
    });
    
    Route::get("/add-product", [ShopController::class,"productForm"]);
});













/////////////////////////////////////////////////////////////////////
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
