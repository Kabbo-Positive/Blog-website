<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(BlogCategory::all()->modelKeys());
        $faker = Faker::create();
        foreach(range(1,1000) as $index){
            DB::table('blogs')->insert([
                'category_id'=> $categories->random(),
                'blog_title'=> $faker->sentence(2),
                'blog_image'=> '1646289096.jpg',
                'author_name'=> $faker->sentence(2),
                'author_image'=> '1646289096.jpg',
                'featured'=> 0,
                'meta_title'=> $faker->sentence(2),
                'meta_description'=> $faker->sentence(5),
                'body'=> $faker->paragraph(2),
            ]);
        }
    }
}
