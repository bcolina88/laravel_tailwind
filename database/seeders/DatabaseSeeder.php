<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    
    public $pathFolder = 'public/';
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if (!Storage::exists($this->pathFolder)) {
            Storage::makeDirectory($this->pathFolder);
        }

        $this->call(UserSeeder::class);

        \App\Models\Proyect::factory(15)->create();


    }
}
