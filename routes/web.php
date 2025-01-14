<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::view("/about", "about");

Route::get("/", [HomepageController::class,"index"]);
Route::get("/contact", [ContactController::class,"index"]);
Route::get("/shop", [ShopController::class,"index"]);

Route::get("/admin/all-contacts", [ContactController::class,"getAllContacts"])->name("allContacts");
Route::get("/admin/delete-contact/{contact}", [ContactController::class,"delete"])->name("deleteContact");
Route::get("/admin/edit-contact-form/{contact}", [ContactController::class,"editView"])->name("editContactView");
Route::post("/admin/edit-contact", [ContactController::class,"edit"])->name("editContact");

Route::get("/admin/add-product", [ShopController::class,"productForm"]);
Route::get("/admin/products", [ProductsController::class,"index"])->name("allProducts");
Route::get("/admin/delete-product/{product}", [ProductsController::class,"delete"])->name("deleteProduct");
Route::get("/admin/edit-product/{product}", [ProductsController::class,"editView"])->name("editProductView");
Route::post("/admin/edit-product", [ProductsController::class,"edit"])->name("editProduct");

Route::post("/send-message", [ContactController::class,"sendMessage"]);
Route::post("/add-product", [ProductsController::class,"addProduct"])->name('addProduct');