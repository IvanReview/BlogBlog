@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent


        <form class="form-horizontal" action="{{route('admin.user.store')}}" method="post">
            @csrf
            @include('admin.users.partials.form')

        </form>
    </div>

@endsection
