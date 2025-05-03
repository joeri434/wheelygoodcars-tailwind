<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Zuinig', 'Automaat', 'Diesel', 'Elektrisch', 'Nieuw APK', 'Sportief'];

    foreach ($tags as $tag) {
        \App\Models\Tag::create(['name' => $tag]);
    }
    }
}
