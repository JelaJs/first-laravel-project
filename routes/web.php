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

    Route::controller(ContactController::class)->group(function () {
        Route::get("/all-contacts", "getAllContacts")->name("allContacts");
        Route::get("/delete-contact/{contact}", "delete")->name("deleteContact");
        Route::get("/edit-contact-form/{contact}", "editView")->name("editContactView");
        Route::post("/edit-contact", "edit")->name("editContact");
    });

   
    Route::controller(ProductsController::class)->group(function () { 
        Route::get("/products", "index")->name("allProducts");
        Route::get("/delete-product/{product}", "delete")->name("deleteProduct");
        Route::get("/edit-product/{product}", "editView")->name("editProductView");
        Route::post("/edit-product/{product}", "edit")->name("editProduct");
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
