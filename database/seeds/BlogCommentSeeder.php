<?php

use Illuminate\Database\Seeder;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'text'=>'комментарий',
                'parent_id'=>'0',
                'article_id'=>'4',
                'user_id'=>'2',
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),

            ],
            [
                'text'=>'комментарий 2 уровня',
                'parent_id'=>'1',
                'article_id'=>'4',
                'user_id'=>'2',
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),
            ],
            [
                'text'=>'комментарий',
                'parent_id'=>'0',
                'article_id'=>'7',
                'user_id'=>'2',
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),

            ],
            [
                'text'=>'комментарий 2 уровня',
                'parent_id'=>'3',
                'article_id'=>'7',
                'user_id'=>'2',
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),

            ],
            [
                'text'=>'Коментарий 3 уровня',
                'parent_id'=>'4',
                'article_id'=>'7',
                'user_id'=>'2',
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),

            ],
            [
                'text'=>'95 бензин',
                'parent_id'=>'0',
                'article_id'=>'1',
                'user_id'=>'2',
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),

            ],
            [
                'text'=>'новый',
                'parent_id'=>'0',
                'article_id'=>'3',
                'user_id'=>'2',
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),

            ],

        ]);
    }
}
