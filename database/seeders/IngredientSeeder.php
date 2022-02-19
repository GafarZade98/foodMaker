<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Meal;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::insert([
            [
                "name" => "Yumurta",
                "photo" => "ingredients\\February2022\\xdTHU35sYixz83Cx5V7C.png",
            ],
            [
                "name" => "Yag",
                "photo" => "ingredients\\February2022\\WAhKyfnD9H72GkSmezmU.png",
            ],
            [
                "name" => "Su",
                "photo" => "ingredients\\February2022\\rTnYoRjEPEztxDxWjwqg.png",
            ],
            [
                "name" => "Un",
                "photo" => "ingredients\\February2022\\pmiT5hD2FhoBCqfb1wo6.png",
            ],
            [
                "name" => "Tomat",
                "photo" => "ingredients\\February2022\\Z1WKR8nNWV5TbuNVWHkM.png",
            ],
            [
                "name" => "Makaron",
                "photo" => "ingredients\\February2022\\dDY8l2RnAPTy30DwD7NR.png",
            ],
        ]);
    }
}

