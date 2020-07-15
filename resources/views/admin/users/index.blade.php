@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список пользователей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent

        <a href="{{route('admin.user.create')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Создать пользователя</a>
        <table class="table table-striped">
            <thead>
            <th>Имя</th>
            <th>Email</th>
            <th>Действие</th>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form onsubmit="if(confirm('Delete?')){return true} else {return false}"
                              action="{{route('admin.user.destroy',$user)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{route('admin.user.edit', $user->id)}}"><i class="fa fa-edit"></i> </a>

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
                        {{$users->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>


    </div>
@endsection
