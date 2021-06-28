<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'abbr' => 'None',
            'name' => 'School not available'
        ]);
        School::create([
            'abbr' => 'ANU',
            'name' => 'All Nations University'
        ]);
        School::create([
            'abbr' => 'UG',
            'name' => 'University of Ghana'
        ]);
        School::create([
            'abbr' => 'KNUST',
            'name' => 'Kwame Nkrumah University of Science and Technology'
        ]);
    }
}
