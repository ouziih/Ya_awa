<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index(CategoryRepo $category){
        return Inertia::render('Welcome',["categories"=>$category->all()]);
    }
}
