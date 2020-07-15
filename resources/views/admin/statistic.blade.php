@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron" style="background-color:#da70d6;">
                    <p><span class="label label-primary"> Категорий {{$count_categories}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron" style="background-color:#cda4de;">
                    <p><span class="label label-primary"> Статей {{$count_articles}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron" style="background-color:#ace5ee;">
                    <p><span class="label label-primary"> Пользователи {{$count_user}}</span></p>
                </div>
            </div>
            <div class="col-sm-3" >
                <div class="jumbotron" style="background-color:#ffdc85;">
                    <p><span class="label label-primary"> Сегодня 0</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-outline-success" href="{{route('admin.category.create')}}">Создать категорию </a>
                @foreach($categories as $category)
                    <a class="list-group" href="{{route('admin.category.edit', $category)}}">
                        <h4 class="list-group-item list-group-item-dark">{{$category->title}}</h4>
                        <p class="list-group-item">Количество статей: {{$category->articles()->count()}}</p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a class="btn btn-block btn-outline-success" href="{{route('admin.article.create')}}">Создать статью </a>
                @foreach($articles as $article)
                    <a class="list-group" href="{{route('admin.article.edit', $article )}}">
                        <h4 class="list-group-item list-group-item-dark">{{$article->title}}</h4>
                        <p class="list-group-item">{{$article->categories()->pluck('title')->implode(', ')}}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
