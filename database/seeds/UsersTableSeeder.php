<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Vincent', 'Olivier', 'Sylvain'];
        DB::table('users')->insert([
            [
                'name' => $names[0],
                'email' => strtolower($names[0]).'@gmail.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => $names[1],
                'email' => strtolower($names[1]).'@gmail.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => $names[2],
                'email' => strtolower($names[2]).'@gmail.com',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
