<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Отображение списка категорий
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(8);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Создание категории
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //получаем родительские категории
        $categories=Category::with('children')->where('parent_id', '0')->get();
        $delimiter='';

        return view('admin.categories.create', compact( 'categories', 'delimiter'));
    }

    /**
     * Сохранение категории
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Редактирование категории
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::with('children')->where('parent_id', '0')->get();
        $delimiter='';
        return view('admin.categories.edit', compact('category', 'categories', 'delimiter'));

    }

    /**
     * Обновление категории после редактирования.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->except('slug'));
        return redirect()->route('admin.category.index');
    }

    /**
     * Удаление категории
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
