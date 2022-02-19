<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Voyager\VoyagerDatabaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(MealSeeder::class);
        $this->call(IngredientSeeder::class);

        User::factory([
            'name' => 'Mikayil Ismayilov',
            'email' => 'mikayil.ismayilov@dunyaschool.az',
            'password' => bcrypt('secret'),
        ])->admin()->create();
    }
}
