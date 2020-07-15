<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[];

        $cName='Без категории';
        $categories[]=[
            'title'=>$cName,
            'slug'=>Str::slug($cName),
            'parent_id'=>0,
            'published'=>"1",
        ];

        for ($i=2; $i<=10; $i++){
            $cName='Категория №'.$i;
            $parentId=($i<5) ? 0 : rand(2,5);

            $categories[]=[
                'title'=>$cName,
                'slug'=>Str::slug($cName),
                'parent_id'=>$parentId,
                'published'=>"1",
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
