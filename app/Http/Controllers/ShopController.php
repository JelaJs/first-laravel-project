<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
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

    public function permalink(ProductsModel $product) {

        return view("shopProduct", [
            "product" => $product
        ]);
    }
}
