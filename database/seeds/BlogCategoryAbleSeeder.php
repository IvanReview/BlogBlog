<?php

use Illuminate\Database\Seeder;

class BlogCategoryAbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoryables')->insert([
            [
                'category_id'=>'2',
                'categoryable_id'=>'1',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'5',
                'categoryable_id'=>'1',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'2',
                'categoryable_id'=>'2',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'10',
                'categoryable_id'=>'2',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'1',
                'categoryable_id'=>'3',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'2',
                'categoryable_id'=>'4',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'10',
                'categoryable_id'=>'4',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'3',
                'categoryable_id'=>'5',
                'categoryable_type'=>'App\Article',
            ],
            [
                'category_id'=>'2',
                'categoryable_id'=>'6',
                'categoryable_type'=>'App\Article',
            ],
        ]);
    }
}
