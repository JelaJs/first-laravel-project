<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductsController extends Controller
{

    private $productRepo;

    public function __construct() {

        $this->productRepo = new ProductRepository();
    }


    public function index() {
        $products = ProductsModel::all();

        return view("allProducts", compact("products"));
    }

    public function addProduct(SaveProductRequest $request) {

       $this->productRepo->createNew($request);

        return redirect()->route("allProducts");
    }

    public function delete($product) {

        $singleProduct = $this->productRepo->getSingleProduct($product);

        if($singleProduct === null) { 
            die("This product doesn't exist");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function editView(ProductsModel $product) {

       return view("editProduct", compact("product"));
    }

    public function edit(EditProductRequest $request, ProductsModel $product) {
        
        $this->productRepo->editProduct($request, $product);

        return redirect()->route("allProducts");
    }
}
