<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepo;
use App\Repository\ProductRepo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index(CategoryRepo $categories, ProductRepo $products){
        return Inertia::render('Welcome',[
            "categories"=>$categories->all(),
            "products"=>$products->all()
            ]);
    }
}
