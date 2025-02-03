<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use App\Repositories\ShopingCartRepository;
use Illuminate\Http\Request;
use Session;

class ShopingCartController extends Controller
{

    public function index() {

        $cart = Session::get('product');
        $products = [];

        foreach($cart as $product) {
            
            $product = ProductsModel::where('id', $product['product_id'])->first();
            array_push($products, $product);
        }

        //$product = ProductsModel::where('id', $request->id)->get();

        return view("cart", [
            "products" => $products
        ]);
    }

    public function addToCart(CartAddRequest $request) {
 
        $product = ProductsModel::where('id', $request->id)->first();
        if($request->amount > $product->amount) {

            return redirect()->back()->withErrors(["We don't have that many $product->name in stock."]);
        }

        Session::push("product", [
            "product_id" => $request->id,
            "amount" => $request->amount
        ]);

        return redirect()->route("cart.list");
    }
}
