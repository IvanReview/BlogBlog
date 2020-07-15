@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach( $errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Введите имя"
       value="@if(old('name')){{old('name')}} @else {{$user->name ?? ""}} @endif">

<label for="">Эмейл</label>
<input type="email" class="form-control" name="email" placeholder="Введите эмейл"
       value="@if(old('email')){{old('email')}} @else {{$user->email ?? ""}} @endif">

<label for="">Пароль</label>
<input type="password" class="form-control" name="password" placeholder="Введите пароль" >

<label for="">Подтверждение Пароля</label>
<input type="password" class="form-control" name="password_confirmation" placeholder="Подтвердите пароль" >
<br>
<button class="btn btn-primary">Готово</button>
