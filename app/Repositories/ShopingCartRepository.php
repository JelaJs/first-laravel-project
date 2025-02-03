<?php

namespace App\Repositories;

use App\Models\ProductsModel;


class ShopingCartRepository { 

    private $productModel;
    public function __construct() {

        $this->productModel = new ProductsModel();
    }

    public function getCartItems($request) {

        
    }
}