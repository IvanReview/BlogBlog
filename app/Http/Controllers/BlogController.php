<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function category($slug)
    {
        $category=Category::where('slug', $slug)->first();
        $articles=$category->articles()->where('published', 1)->paginate(10);
        return view('blog.category', compact('category', 'articles'));
    }

    public function article($slug)
    {
        $article=Article::where('slug', $slug)->first();
        $user=Auth::user();
        $comments = Comment::all();

        return view('blog.article', compact( 'article', 'user', 'comments'));

    }
}
