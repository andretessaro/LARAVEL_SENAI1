<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trocar Senha</title>
</head>
<body>
    <h1>Trocar Senha</h1>

    @if(session('sucess'))
        <p style="color:green">{{ session('sucess')}}</p>
    @endif

    <form action="{{ route('senha.trocar') }}" method="POST">
        @csrf

        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email..."
            require value="{{old('email')}}">

        <br><br>
        <label for="password">Nova senha:</label>
        <input type="password" name="password" id="password" placeholder="Senha..."
            require value="{{old('password')}}">

        <br><br>
        <input type="submit" value="Alterar Senha">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>

        </div>
    @endif
</body>
</html>