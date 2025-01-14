<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = ProductsModel::all();

        return view("allProducts", compact("products"));
    }

    public function addProduct(Request $request) {
        $request->validate([
            //unique:products ovo ce reci da je name unutar tabele products -> unique... Nece on izmeniti strukturtu tabele u bazi vec ce prilikom provere reci SELECT * FROM products WHERE name = "vrednost"
            "name" => "required|string|min:3|max:64|unique:products",  
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

        return redirect()->route("allProducts");
    }

    public function delete($product) {

        $singleProduct = ProductsModel::where(["id"=> $product])->first();

        if($singleProduct === null) { 
            die("This product doesn't exist");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function editView($product) {
        $singleProduct = ProductsModel::where(["id"=> $product])->first();
        
        if($singleProduct === null) {
            die("Product with this Id doesn't exist");
        }

       return view("editProduct", compact("singleProduct"));
    }

    public function edit(Request $request) {
        $request->validate([
            "name" => "required|string|min:3|max:64|unique:products",  
            "amount" => "required|integer|",
            "price" => "required|numeric",
            "description" => "required|string",
            "id" => "required|integer|min:1"
        ]);

        $product = ProductsModel::where(["id" => $request->id])->first();
        
        $product->update([
            "name"=> $request->get("name"),
            "amount"=> $request->get("amount"),
            "price"=> $request->get("price"),
            "description"=> $request->get("description")
        ]);

        return redirect()->route("allProducts");
    }
}
