@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категория @endslot
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


        <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
            @csrf
            @method('PATCH')

            <label for="">Статус</label>
            <select class="form-control" name="published">
                    <option value="0" @if($category->published==0) selected="" @endif>Не опубликовано</option>
                    <option value="1" @if($category->published==1) selected="" @endif>Опубликовано</option>
            </select>
            <label for="">Заголовок</label>
            @error('title')
                 <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$category->title ?? ""}}">

            <label for="Slug">Псевдоним</label>
            <input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
                   value="{{$category->slug ?? ""}}" readonly="">

            <label for="">Родительская категория</label>
            <select class="form-control" name="parent_id">
                <option value="0">--без родителей--</option>
                @include('admin.categories.particles.update_categories', ['categories'=>$categories])
            </select>
            <br>
            <button class="btn btn-dark">Редактировать</button>
        </form>
    </div>

@endsection

