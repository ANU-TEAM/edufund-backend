<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Application::create([
            'title' => 'Sosu First Fund', 'description' => 'Hello Hello Sosu Hello Sosu Hello Sosu Sosu',
            'image_url' => 'https://via.placeholder.com/150',
            'target_amount' => 400, 'amount_gained' => 20, 'user_id' => 1, 'category_id' => 3,
        ]);

        \App\Models\Application::create([
            'title' => 'Sosu Second Fund', 'description' => 'Hello Sosu', 'image_url' => 'https://via.placeholder.com/150',
            'target_amount' => 600, 'amount_gained' => 20, 'approved' => 1, 'user_id' => 1, 'category_id' => 2,
        ]);

        \App\Models\Application::create([
            'title' => 'Sosu Third Fund', 'description' => 'Hello Sosu', 'image_url' => 'https://via.placeholder.com/150',
            'target_amount' => 100, 'amount_gained' => 20, 'approved' => 1, 'user_id' => 1, 'category_id' => 1,
        ]);

        \App\Models\Application::create([
            'title' => 'Sosu Third Fund', 'description' => 'Hello Sosu', 'image_url' => 'https://via.placeholder.com/150',
            'target_amount' => 100, 'amount_gained' => 20, 'approved' => 1, 'user_id' => 1, 'category_id' => 1,
        ]);
    }
}
