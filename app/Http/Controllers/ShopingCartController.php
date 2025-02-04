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
        
        $combined = [];
        foreach(Session::get('product') as $item) {

            $product = ProductsModel::firstWhere('id', $item['product_id']);
            if($product) {
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'totalPrice' => $product->price * $item['amount']
                ];
            }
        }

        return view("cart", [
            "combined" => $combined,
        ]);
    }

    public function addToCart(CartAddRequest $request) {
 
        $product = ProductsModel::where('id', $request->id)->first();
        if($request->amount > $product->amount) {

            return redirect()->back()->withErrors(["We don't have that many $product->name in stock."]);
        }

        Session::push("product", [
            "product_id" => $request->id,
            "amount" => $request->amount,
        ]);

        return redirect()->route("cart.list");
    }
}
