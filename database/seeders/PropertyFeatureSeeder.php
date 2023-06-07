<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feature = new PropertyFeature();
        $feature->name = 'Area';
        $feature->input_type = 'text'; //text, select, checkbox
        $feature->input_value = null;
        $feature->icon = null;
        $feature->save();

        $feature = new PropertyFeature();
        $feature->name = 'Year Built';
        $feature->input_type = 'text'; //text, select, checkbox
        $feature->input_value = null;
        $feature->icon = null;
        $feature->save();
    }
}
