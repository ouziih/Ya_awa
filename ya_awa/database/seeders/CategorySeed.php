<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Categorie;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('/db.json');
        $json = File::get($jsonPath);
        $datas = json_decode($json,true);

        if (isset($datas["categories"])) {
            foreach($datas["categories"] as $data){
                Categorie::create([
                    'name' => $data['name'],
                    'color' => $data['color'],
                    'image' => $data['image']
                    ]);
                }
        };
    }
}
