<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    private $productRepo;
    public function __construct() {

        $this->productRepo = new ProductRepository();
    }

    public function index() {

        $this->productRepo->getLast6Products();

        return view("shop", compact("last6products"));
    }

    public function productForm() {
        return view("productForm");
    }
}
