<nav class="navbar navbar-expand-md navbar-light shadow-sm" id="navbar" >
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"> На главную </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="mr-1" >
                    <a href="{{route('admin.index')}}"  class="btn btn-danger" >Панель состояния</a>
                </li>

                <li class="dropdown btn-group">
                    <a href="#" role="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Блог меню</a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-item"><a href="{{route('admin.category.index')}}">Категории</a></li>
                        <li class="dropdown-item"><a href="{{route('admin.article.index')}}">Статьи</a></li>
                    </ul>
                </li>

                <li class="dropdown btn-group ml-2">
                    <a href="#" role="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Управление пользователями</a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-item"><a href="{{route('admin.user.index')}}">Пользователи</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
