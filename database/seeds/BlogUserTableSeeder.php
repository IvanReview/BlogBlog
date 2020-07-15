<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class BlogUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[

            [   'name'=>'Admin',
                'email'=>'AdminLaravel@gmail.com',
                'password'=>bcrypt(12345678),
                'is_admin'=>'1'
            ],
            [   'name'=>'Аффтор',
                'email'=>'authorl@g.g',
                'password'=>bcrypt(12345678),
                'is_admin'=>'1'
            ],
        ];
        DB::table('users')->insert($data);
    }
}
