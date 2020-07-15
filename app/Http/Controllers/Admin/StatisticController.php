<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
class StatisticController extends Controller
{
    public function statisticBlog()
    {
        $categories=Category::LastCategories(5);
        $articles=Article::LastArticles(5);
        $count_categories=Category::count();
        $count_articles=Article::count();
        $count_user = User::count();

        return view('admin.statistic', compact('categories', 'articles', 'count_articles', 'count_categories', 'count_user'));
    }
}
