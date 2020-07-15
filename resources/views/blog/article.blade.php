@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_keywords', $article->meta_keywords)
@section('meta_description', $article->meta_description)

{{--@section('title')
    {{$category->title}} -Test
@endsection--}}

@section('content')
    <div class="container">

        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-10 px-0" style="margin-left: 100px">
                <img style="width: 800px; height: 450px;" src="{{Storage::url($article->image)}}" alt="{{$article->slug}}">
                <h1 class="display-4 font-italic">{{$article->title}} </h1>
                <p class="blog-post-meta">Созданно: {{$article->created_at}} <a href="#">Автор: {{$article->user->name}}</a></p>
                <p class="lead my-3">{{$article->description_short}}</p>
            </div>
        </div>

    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-10 blog-main">
                <div class="blog-post">
                    <p>{{$article->description}}</p>
                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
                </div><!-- /.blog-post -->
                <br>
            </div>
        </div>
    </main>



    <div class="container">
    <div class="chatContainer">

        <div class="chatTitleContainer">Комментарии</div>
        <div class="chatHistoryContainer">

            <ul class="formComments" id="formComments">

                @if(count($article->comment)>0)
                    @set($com, $article->comment->groupBy('parent_id'))
                    @foreach($com as $k => $comments) {{--в переменну k попадают значения parent_id--}}
                        @if($k !== 0)
                            @break
                        @endif
                        @include('blog.comment',['items' => $comments])
                    @endforeach
                @endif

            </ul>

        </div>
        <form method="POST" action="{{route('comments.add')}}" id="formElem">
            @csrf
            <div class="input-group input-group-sm chatMessageControls">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Комментарий:</span>
                    </div>

                    @error('text')
                         <div class="alert alert-danger error-message">{{ $message }}</div>
                    @enderror

                    <input type="text" name="text" id="message" class="form-control message" placeholder="Введите сообщение.."
                           aria-describedby="basic-addon1" value="">

                    <span class="input-group-btn1">
                        <button id="clearMessageButton" class="btn btn-default" type="submit">Очистить</button>
                        <button id="sendMessageButton" class="btn btn-primary" type="submit"><i class="fa fa-send"></i>Отправить</button>
                    </span>
                    <span class="input-group-btn">
                </div>
                <div style="color: red; width: 100%; text-align:center;" class="errors" id="errors"></div>
                <p class="form-submit">
                    <input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{$article->id}}">
                    <input id="comment_parent" type="hidden" name="comment_parent" value="0">
                </p>
                </span>
            </div>
        </form>

        <br>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{route('home')}}">Назад</a>
        </nav>
    </div>
    </div>
@endsection
