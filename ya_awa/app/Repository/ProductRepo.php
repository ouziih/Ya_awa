<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepo{
    public function all(){
        return Product::query()->where('active',true)->get()->toArray();
    }
}