<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("vi");
        for($i = 0; $i < 10; $i++) {
            Classe::create([
                'grade_level' =>  $faker->randomElement(['Pre-K','Kindergarten']),
                'room_number' => 'VH' . $i+1,
            ]);
        }

    }
}