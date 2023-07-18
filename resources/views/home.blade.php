@extends('master')

@section('content')

    <div>
        <div class="container-login">
            <h2>Patativa do Assaré</h2>

            @error('error')
            <span>{{$message}}</span>
            @enderror
            <form action="{{route('users.show')}}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email">
            <span class="@error ('email') error @enderror">{{$errors->first('email')}}</span> 
            <input type="password" name="password" placeholder="Senha">
            <span class="@error ('password') error @enderror">{{$errors->first('password')}}</span>
            <button name="Entrar" type="submit" class="btn-entrar">Entrar</button>
            <a name="cadastrar" type="submit" class="btn-novo" href="{{route('users.store')}}">Cadastrar-se</a>
            </form>
        </div>
    </div>    
</body>
</html>
@endsection