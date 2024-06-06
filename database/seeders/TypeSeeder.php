<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = ['Type 1', 'Type 2', 'Type 3', 'Type 4', 'Type 5'];

        foreach ($types as $type_name) {
            $new_type = new Type();

            $new_type->name = $type_name;
            $new_type->description = $faker->sentence(rand(5,30), false);

            $new_type->save();
        }
    }
}
