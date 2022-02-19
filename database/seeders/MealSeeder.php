<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::insert([
            [
                "name" => "Xamır",
                "url" => "https://www.youtube.com/watch?v=qooEhxBfY4E",
                "description" => "<p>1 st su 1 st un</p>",
                "photo" => "meals\\February2022\\I1mTsZAdEVT50Xa3snJ7.png",
            ],

            [
                "name" => "Yumurta Qaynatma",
                "url" => "https://www.youtube.com/watch?v=gFWN4_1EBDs",
                "description" => "<p>su + yumurta</p>",
                "photo" => "meals\\February2022\\neVC6gKD7VUwhwJhS2RK.jpg",
            ],

            [
                "name" => "Cake",
                "url" => "https://www.youtube.com/watch?v=gFWN4_1EBDs",
                "description" => "<p>yumurta + un + su +tomat&nbsp;</p>",
                "photo" => "meals\\February2022\\GMnxl67fatyDG2u3YlJW.png",
            ],
        ]);
    }
}
