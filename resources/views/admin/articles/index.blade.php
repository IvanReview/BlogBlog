@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
                @slot('title') Список новостей @endslot
                @slot('parent') Главная @endslot
                @slot('active') Новости @endslot
        @endcomponent

        <a href="{{route('admin.article.create')}}" class="btn btn-primary"><i class="fa fa-wheelchair-alt"></i> Создать новость</a>
        <table class="table table-striped">
            <thead>
                <th>Наименование</th>
                <th>Публикация</th>
                <th>Действие</th>
            </thead>
            <tbody>
            @forelse($articles as $article)
                <tr>
                    <td><a href="{{route('admin.article.show',$article->id)}}">{{$article->title}}</a></td>
                    <td>{{$article->published}}</td>
                    <td>
                    <form onsubmit="if(confirm('Delete?')){return true} else {return false}"
                          action="{{route('admin.article.destroy',$article)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{route('admin.article.edit', $article->id)}}"><i class="fa fa-edit"></i> </a>

                        <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                    </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Данные отсутствуют</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination">
                            {{$articles->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>


    </div>
@endsection
