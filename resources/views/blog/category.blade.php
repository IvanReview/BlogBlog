@extends('layouts.app')

@section('title', $category->title.'-xxx')

{{--@section('title')
    {{$category->title}} -Test
@endsection--}}

@section('content')
    <div class="container">
        @forelse($articles as $article)
            <div class="row">
                <div class="col-sm-12">
                    <div class="category-article"  style="display: flex">
                        <div class="blog-image">
                            <img src="{{Storage::url($article->image)}}" title="img6" alt="#" />
                        </div>
                        <div class="blog-text">
                            <h1><a href="{{route('article', $article->slug)}}">{{$article->title}} </a></h1>
                            <p>{!! $article->description_short !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h2 class="text-center">Пусто</h2>
        @endforelse
        {{$articles->links()}}
    </div>



@endsection

