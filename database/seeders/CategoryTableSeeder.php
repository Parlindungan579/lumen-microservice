<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title_categories' => "Web Programming",
                'content_categories' => "Web Programming merupakan kategori untuk membahas semua pemrograman di dalam pengembangan website."
            ],
            [
                'title_categories' => "Mobile Programming",
                'content_categories' => "Mobile Programming merupakan kategori untuk membahas semua hal di bidang mobile programming"
            ],
            [
                'title_categories' => "Data Science",
                'content_categories' => "Data Science merupakan kategori untuk membahas semua hal di bidang data science."
            ],
        ]);
    }
}
