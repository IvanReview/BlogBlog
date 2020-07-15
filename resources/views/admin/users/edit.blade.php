@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')  Редактирование пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent


        <form class="form-horizontal" action="{{route('admin.user.update', $user->id)}}" method="post">
            @csrf
            @method('PUT')
            @include('admin.users.partials.form')
        </form>
    </div>

@endsection

