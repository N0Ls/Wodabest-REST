<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 25;
        for($i = 1; $i <= $count; $i++)
        {
            DB::table('comments')->insert([
                'user_id' => rand(1, 2),
                'image_id' => rand(1, 45),
                'content' => Str::random(65)
            ]);
        }
    }
}
