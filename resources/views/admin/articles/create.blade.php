@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent

            {{--Вывод ошибок--}}
            <div class="container">
                @if($errors->any())
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                {{$errors->first()}}
                            </div>
                        </div>
                    </div>
                @endif
            </div>


        <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.article.store')}}" method="post">
            @csrf
            <label for="">Статус</label>
            <select class="form-control" name="published">
                    <option value="0">Не опубликовано</option>
                    <option value="1" selected>Опубликовано</option>
            </select>
            <br>
            <label for="">Заголовок</label>
            <input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{old('title')}}">

            <br>
            <label for="Slug">Slug(Уникальное значение)</label>
            <input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
                   value="" readonly="">

            <br>
            <label for="">Категория</label>
            <select class="form-control" name="categories[]" multiple="multiple">
                @include('admin.articles.particles.create_categories', ['categories'=>$categories])
            </select>

            <label for="">Краткое описание новости</label>
            <textarea class="form-control" id="description_short" name="description_short" rows="5">{{old('description_short')}}</textarea>

            <label for="">Полное описание новости</label>
            <textarea class="form-control" id="description" name="description" rows="5">{{old('description')}}</textarea>

            <br>
            <div class="form-group  row">
                <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                <div class="col-sm-10">
                    <label class="btn btn-success btn-file">
                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                    </label>
                </div>
            </div>

            <br>
            <button class="btn btn-primary">Создать</button>


            <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::id()}}">
        </form>
    </div>

@endsection
