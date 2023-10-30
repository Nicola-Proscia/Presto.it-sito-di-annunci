<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    */
    public function run(): void
    {
        \App\Models\User::factory(0)->create();
        
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'assassinscreedcompany@gmail.com',
            'password' => bcrypt('assassins'),
            'is_revisor' => true,
        
        ]);
        
        
        $categories = 
        [
            'Arredamento',
            'Abbigliamento',
            'Giardinaggio',
            'Informatica',
            'Motori',
            'Elettrodomestici',
            'Giochi',
            'Sport',
            'Accessori',
            'Libri',
        ];      
        
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
        
    }
}

