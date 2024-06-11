<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Item;
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

        $item_ids = Item::all()->pluck('id')->all(); // Array con gli id degli Item


        for ($i=0; $i < 10 ; $i++) { 
            
            $new_character = new Character();
            
            $new_character->name = $faker->name();
            $new_character->description = $faker->sentence(rand(5,30), false);
            $new_character->attack = $faker->numberBetween(2,15);
            $new_character->defence = $faker->numberBetween(8,25);
            $new_character->speed = $faker->numberBetween(30, 100);
            $new_character->life = $faker->numberBetween(10,200);

            $new_character->save();
            // dd($item_ids);

            $random_item_ids = $faker->randomElements($item_ids, null);

            $random_qty = rand(1,11);


            $new_character->items()->attach($random_item_ids, ['qty' => $random_qty]);

        }
    }
}
