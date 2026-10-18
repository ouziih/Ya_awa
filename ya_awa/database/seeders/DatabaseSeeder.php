<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jsonPath = database_path('/data/tgddemo.json/db.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("Le fichier db.json est introuvable.");
            return;
        }

        $json = File::get($jsonPath);
        $datas = json_decode($json,true);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
