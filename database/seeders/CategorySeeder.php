<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create(['name' => 'primary']);
        \App\Models\Category::create(['name' => 'secondary']);
        \App\Models\Category::create(['name' => 'tertiary']);
    }
}
