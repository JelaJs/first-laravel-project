<?php

namespace App\Repositories;

use App\Models\ProductsModel;

class ProductRepository {

    private $productModel;

    public function __construct() {

        $this->productModel = new ProductsModel();
    }

    public function createNew($request) {

        $this->productModel->create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
        ]);
    }

    public function editProduct($request, $product) {

        $product->update([
            "name"=> $request->get("name"),
            "amount"=> $request->get("amount"),
            "price"=> $request->get("price"),
            "description"=> $request->get("description")
        ]);
    }
}