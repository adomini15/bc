<?php

namespace Database\Seeders;

use App\Models\Service;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \Liior\Faker\Prices($faker));

        $titles = [
            'Masaje Relajante',
            'Masaje Reductor',
            'Microshading pestanas',
            'Microblading cejas mujeres',
            'Microblading cejas hombres',
            'Laminado de cejas',
            'Depilacion mujeres',
            'Depilacion caballeros',
            'Facial'
        ];

    
        foreach ($titles as $title) {
            Service::create([
                'title' => $title,
                'description' => $faker->text(255),
                'price' => $faker->price(500, 1000, true, true)
            ]);
        }

       
    }
}
