<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $_user = new User();
            $_user->name = $faker->name();
            $_user->email = $faker->email();
            $_user->restaurant_name = $faker->company();
            $_user->slug = Str::slug($_user->name);
            $_user->address = $faker->address();
            $_user->image = 'placeholders/no_cover_image.png';
            $_user->vat = 12345678901;
            $_user->password = $faker->password(60);
            $_user->save();
        }
    }
}
