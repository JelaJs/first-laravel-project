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

    public function editView(ProductsModel $product) {

       return view("editProduct", compact("product"));
    }

    public function edit(Request $request, ProductsModel $product) {
        $request->validate([
            "name" => "required|string|min:3|max:64|unique:products",  
            "amount" => "required|integer|",
            "price" => "required|numeric",
            "description" => "required|string"
        ]);
        
        $product->update([
            "name"=> $request->get("name"),
            "amount"=> $request->get("amount"),
            "price"=> $request->get("price"),
            "description"=> $request->get("description")
        ]);

        return redirect()->route("allProducts");
    }
}
