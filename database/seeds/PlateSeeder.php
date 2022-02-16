<?php

use App\Models\Plate;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run(Faker $faker){
            for ($i=0; $i < 60; $i++) { 
                $_plate = New Plate();
                $_plate->name = $faker->sentence(1);
                $_plate->description = $faker->paragraph(1);
                $_plate->ingredients = $faker->sentence(8);
                $_plate->image = 'placeholders/no_image.png';
                $_plate->price = $faker->randomFloat(3, 1, 50);
                $_plate->available = $faker->boolean(true);
                $_plate->save();
            }
        }

}