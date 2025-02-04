<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductsModel;
use App\Repositories\ShopingCartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ShopingCartController extends Controller
{

    public function index() {
        
        $combined = [];

        if(!Session::exists('product')) {
            return redirect()->back()->withErrors('Cart is empty');
       } 

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

    public function order() {

       $cartItems = Session::get('product');
       $totalOrderPrice = 0;

       foreach($cartItems as $item) {

            $product = ProductsModel::firstWhere('id', $item['product_id']);

            if($product->amount < $item['amount']) {

                return redirect()->back()->withErrors("We don't have that much product in stock.");
            }

            $product->update([
                "amount" => $product->amount - $item['amount']
            ]);

            $totalOrderPrice += $product->price * $item['amount'];
        }

       $order = Orders::create([
            'user_id' => Auth::user()->id,
            'price' => $totalOrderPrice
       ]);

       foreach($cartItems as $item) {

            $product = ProductsModel::firstWhere('id', $item['product_id']);

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $product->price * $item['amount'],
            ]);
        }

       Session::forget('product');

       return view('thankYou');
    }
}
