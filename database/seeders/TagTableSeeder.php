<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name_tags' => "Website",
            ],
            [
                'name_tags' => "Mobile",
            ],
            [
                'name_tags' => "Data",
            ],
        ]);
    }
}
