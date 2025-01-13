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

    public function delete($product) {

        $singleProduct = ProductsModel::where(["id"=> $product])->first();

        if($singleProduct === null) { 
            die("This product doesn't exist");
        }

        $singleProduct->delete();

        return redirect()->back();
    }
}
