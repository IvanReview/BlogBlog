<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticlesCreateRequest;
use App\Http\Requests\ArticlesUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function index()
    {
        $articles=Article::orderBy('created_at','DESC')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }


    /**
     * Созданье статьи
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::with('children')->where('parent_id', 0)->get();
        $delimiter='';
        return view('admin.articles.create', compact('categories', 'delimiter'));
    }


    /**
     * Сохранение статьи
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesCreateRequest $request)
    {
        $data=$request->all();

        //картинка
        if ($request->has('image')){
            //получение пути к файлу и сохранение (store) в папку
            $path=$request->file('image')->store('products');
            //переназначение пути
            $data['image']=$path;
        }
        //пользователь
        $user_id=Auth::user()->id;
        $data['user_id'] = $user_id;



        $article = Article::create($data);

        // если запрос содержит категории записываем в промежуточную таблицу
        if($request->input('categories')) {
            $article->categories()->attach($request->input('categories'));
        }

        return redirect()->route('admin.article.index');
    }

    /**
     * Детальный просмотр статьи
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $user=Auth::user();
        return view('admin.articles.show', compact('article', 'user'));
    }


    /**
     * Редактирование статьи
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories=Category::with('children')->where('parent_id', 0)->get();
        $delimiter='';
        return view('admin.articles.edit', compact('article', 'delimiter', 'categories'));
    }



    /**
     * Обновление статьи после редактирования
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesUpdateRequest $request, Article $article )
    {

        $data=$request->except('slug');

        //картинка
        if ($request->has('image')){
            //удаляем старое изображение
            Storage::delete($article->image);
            //получение пути к файлу и сохранение (store) в папку
            $path=$request->file('image')->store('products');
            //переназначение пути
            $data['image']=$path;
        }
        $article->update($data);
        //сначала удаляем данные в промежуточной таблице
        $article->categories()->detach();
        if ($request->input('categories')){
            $article->categories()->attach($request->input('categories'));
        }

        return redirect()->route('admin.article.index');
    }


    /**
     * Удаление статьи
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.article.index');
    }
}
