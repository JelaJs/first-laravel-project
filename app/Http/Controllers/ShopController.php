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
}
