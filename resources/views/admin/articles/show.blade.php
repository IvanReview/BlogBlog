@extends('admin.layouts.app_admin')


@section('content')
<body>


<div class="container">

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-10 px-0">
            <img style="width: 800px; height: 450px" src="{{Storage::url($article->image)}}" alt="{{$article->slug}}">
            <h1 class="display-4 font-italic">{{$article->title}} </h1>
            <p class="blog-post-meta">Созданно: {{$article->created_at}} <a href="#">Авьор: {{$user->name}}</a></p>
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

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="{{route('admin.article.index')}}">Назад</a>
            </nav>

        </div>

    </div>
</main>

</body>
</html>
@endsection
