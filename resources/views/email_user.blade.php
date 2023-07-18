@extends('master')

@section('content')

    <div>
        <div class="email-content">
            <h2>Seja Bem-Vindo {{auth()->user()->name}}</h2>
            <form action="{{route('contact.store')}}" method="POST">
            @csrf
            <label>Subject:</label><br>
            <input type="text" name="subject" class="subject" placeholder="email teste" value="teste">
            <label>Message:</label><br>
            <textarea class="message" name="message" cols="30" rows="10" placeholder="Messagem"value="teste"></textarea>
            <label>Emails List:</label><br>
            <textarea name="emaillist" cols="30" rows="10" placeholder="email" value="teste@gmail.com"></textarea>
            <button  type="submit" class="send" >Enviar</button>
            <a href="{{route('users.destroy')}}" class="logout">Logout</a>
            </form>
        </div>
    </div>    
</body>
</html>
@endsection