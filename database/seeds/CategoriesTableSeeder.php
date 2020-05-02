<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['3D', 'Design', 'Illustration', 'Peinture'];
        DB::table('categories')->insert([
            [
                'name' => $names[0],
                'slug' => str_slug($names[0])
            ],
            [
                'name' => $names[1],
                'slug' => str_slug($names[1])
            ],
            [
                'name' => $names[2],
                'slug' => str_slug($names[2])
            ],
            [
                'name' => $names[3],
                'slug' => str_slug($names[3])
            ],
        ]);
    }
}
