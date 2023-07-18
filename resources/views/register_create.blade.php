@extends('master')

@section('content')

    <div>
        <div class="container-login">
            <h2>Cadastro</h2>
        
            <form action="{{route('users.store')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nome" value="{{old('name')}}">
            <span class="@error ('name') error @enderror">{{$errors->first('name')}}</span>
            <input type="email" name="email" placeholder="Email" value="brunoteste@gmail.com">
            <span class="@error ('email') error @enderror">{{$errors->first('email')}}</span>
            <input type="password" name="password" placeholder="Senha" value="1234">
            <span class="@error ('password') error @enderror">{{$errors->first('password')}}</span>
            <input type="password" name="password_confirmation" placeholder="Senha" value="1234">

            <button name="cadastrar" type="submit" class="btn-novo">Registrar</button>
            </form>
        </div>
    </div>    
</body>
</html>
@endsection