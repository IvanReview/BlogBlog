<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BlogUserTableSeeder::class);
        $this->call(BlogArticleSeeder::class);
        $this->call(BlogCategoryAbleSeeder::class);
        $this->call(BlogCommentSeeder::class);
    }
}
