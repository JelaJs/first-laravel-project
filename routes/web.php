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
Route::get("/shop", [ShopController::class,"index"]);

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () { 

    Route::get("/all-contacts", [ContactController::class,"getAllContacts"])->name("allContacts");
    Route::get("/delete-contact/{contact}", [ContactController::class,"delete"])->name("deleteContact");
    Route::get("/edit-contact-form/{contact}", [ContactController::class,"editView"])->name("editContactView");
    Route::post("/edit-contact", [ContactController::class,"edit"])->name("editContact");
    
    Route::get("/add-product", [ShopController::class,"productForm"]);
    Route::get("/products", [ProductsController::class,"index"])->name("allProducts");
    Route::get("/delete-product/{product}", [ProductsController::class,"delete"])->name("deleteProduct");
    Route::get("/edit-product/{product}", [ProductsController::class,"editView"])->name("editProductView");
    Route::post("/edit-product/{product}", [ProductsController::class,"edit"])->name("editProduct");

});



Route::post("/send-message", [ContactController::class,"sendMessage"]);
Route::post("/add-product", [ProductsController::class,"addProduct"])->name('addProduct');










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
