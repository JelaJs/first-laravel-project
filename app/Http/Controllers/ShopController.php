<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {

        $products = [
            "iPhone 14", "Samsung Galaxy s24", "Samsung Galaxy A54", "iPhone 13 pro"
        ];

        return view("shop", compact("products"));
    }
}
