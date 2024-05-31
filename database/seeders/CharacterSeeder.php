<?php

namespace Database\Seeders;

use App\Models\Character;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10 ; $i++) { 
            
            $new_character = new Character();
            
            $new_character->name = $faker->name();
            $new_character->description = $faker->sentence(rand(5,30), false);
            $new_character->attack = $faker->numberBetween(2,15);
            $new_character->defense = $faker->numberBetween(8,25);
            $new_character->speed = $faker->numberBetween(30, 100);
            $new_character->life = $faker->numberBetween(10,200);

            $new_character->save();
        }
    }
}
