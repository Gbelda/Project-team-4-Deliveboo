<?php

use App\Models\Category;
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
        //

        $categories = ['Cucina Italiana', 'Messicano', 'Indiano', 'Fast Food', 'Asiatico', 'Kebab', 'Pizza', 'Poke', 'Pesce', 'Carne', 'Altro'];

        foreach ($categories as $category) {
            $_category = new Category();
            $_category->name = $category;
            $_category->slug = Str::slug($_category->name);
            $_category->save();
        }

    }
}
