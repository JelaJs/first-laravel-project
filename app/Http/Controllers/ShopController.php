<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {

        $last6products = ProductsModel::orderBy('id', 'desc')->take(6)->get();

        return view("shop", compact("last6products"));
    }

    public function productForm() {
        return view("productForm");
    }

    public function addProduct(Request $request) {
        $request->validate([
            "name" => "required|string|min:3|max:64",
            "amount" => "required|integer|",
            "price" => "required|numeric",
            "description" => "required|string"
        ]);

        ProductsModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
        ]);

        return redirect("/shop");
    }

    public function listAllProducts() {

        $products = ProductsModel::all();

        return view("allProducts", compact("products"));
    }
}
