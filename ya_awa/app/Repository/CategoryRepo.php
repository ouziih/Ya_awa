<?php

namespace App\Repository;

use App\Models\Categorie;

class CategoryRepo{

    public function all(){
        return ["categories"=>$this->categories()];
    }

     public function categories(){
         return Categorie::query()->get()->map(
            function (Categorie $categorie) {
                return $categorie->formattage();
                })->all();
    }

}