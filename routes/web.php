<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopingCartController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::view("/about", "about");

Route::get("/", [HomepageController::class,"index"]);

Route::get("/contact", [ContactController::class,"index"]);
Route::post("/send-message", [ContactController::class,"sendMessage"]);

Route::post("/add-product", [ProductsController::class,"addProduct"])->name('addProduct');

Route::get("/shop", [ShopController::class,"index"]);
Route::get("/shop/product/{product}", [ShopController::class, "permalink"])->name("shop.permalink");
Route::post("/cart/add", [ShopingCartController::class, "addToCart"])->name("cart.add");
Route::get("/cart", [ShopingCartController::class, "index"])->name('cart.list');



///ADMIN
Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () { 

    Route::controller(ContactController::class)->prefix('/contacts')->name('contacts.')->group(function () {
        Route::get("/all", "getAllContacts")->name("all");
        Route::get("/delete/{contact}", "delete")->name("delete");
        Route::get("/edit-form/{contact}", "editView")->name("editView");
        Route::post("/edit", "edit")->name("edit");
    });
   
    Route::controller(ProductsController::class)->prefix('products')->name('products.')->group(function () { 
        Route::get("/all", "index")->name("all");
        Route::get("/delete/{product}", "delete")->name("delete");
        Route::get("/edit/{product}", "editView")->name("editView");
        Route::post("/edit/{product}", "edit")->name("edit");
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
