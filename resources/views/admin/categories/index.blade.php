@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
                @slot('title') Список категорий @endslot
                @slot('parent') Главная @endslot
                @slot('active') Категория @endslot
        @endcomponent

        <a href="{{route('admin.category.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Создать категорию</a>
        <table class="table table-striped">
            <thead>
                <th>Наименование</th>
                <th>Публикация</th>
                <th>Действие</th>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->published}}</td>
                    <td>
                    <form onsubmit="if(confirm('Удалить?')){return true} else {return false}"
                          action="{{route('admin.category.destroy',$category->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                       {{-- Редактировать--}}
                        <a href="{{route('admin.category.edit', $category->id)}}"><i class="fa fa-edit"></i> </a>
                        {{--Удалить--}}
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
            {{--Пагинация--}}
            <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination">
                            {{$categories->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>


    </div>
@endsection
