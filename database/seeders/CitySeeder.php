<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [

            [
                'governorate_id' => 1,
                'name' => [
                    'ar' => 'الإسكندرية',
                    'en' => 'Alexandria',
                ],
            ],
            [
                'governorate_id' => 1,
                'name' => [
                    'ar' => 'برج العرب',
                    'en' => 'Borg El Arab',
                ],
            ],
            [
                'governorate_id' => 1,
                'name' => [
                    'ar' => 'المنتزه',
                    'en' => 'El Montaza',
                ],
            ],

            // Cairo Governorate (ID: 2)
            [
                'governorate_id' => 2,
                'name' => [
                    'ar' => 'مدينة نصر',
                    'en' => 'Nasr City',
                ],
            ],
            [
                'governorate_id' => 2,
                'name' => [
                    'ar' => 'مصر الجديدة',
                    'en' => 'Heliopolis',
                ],
            ],
            [
                'governorate_id' => 2,
                'name' => [
                    'ar' => 'المعادي',
                    'en' => 'Maadi',
                ],
            ],
        ];

        // Seed cities
        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
