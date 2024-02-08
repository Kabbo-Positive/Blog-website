<?php

namespace Database\Seeders;

use App\Models\PhotographyCategory;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PhotographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pcategories = collect(PhotographyCategory::all()->modelKeys());
        $faker = Faker::create();
        foreach(range(1,1000) as $index){
            DB::table('photographies')->insert([
                'pcategory_id'=> $pcategories->random(),
                'image'=> '1645264992.jpg',
                'title'=> $faker->sentence(2),
                'sub_title'=> $faker->sentence(3),
                'meta_title'=> $faker->sentence(3),
                'meta_description'=> $faker->sentence(5),
                'status'=> 0,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        }
    }
}
