<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
	       'name'  => 'brayan',
	       'email' => 'admin@admin.com',
	       'password' => bcrypt('123456789'),

        ]);

     
    }
}
