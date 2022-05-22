<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'Mehmet Ali ŞAMİOĞLU',
            'email' => 'sami@sami.com',
            'password' => bcrypt('samisami'),
            'role' => 'super-admin'
        ]);
        \App\Models\User::factory(50)->create();
    }
}
