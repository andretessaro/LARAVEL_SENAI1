<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Biblioteca</title>
</head>
<body>
    <h1>Atualizar Biblioteca</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('biblioteca.update', $biblioteca->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{ old('nome', $biblioteca->nome) }}" required>

        <input type="text" name="autor" value="{{ old('autor', $biblioteca->autor) }}" required>

        <input type="text" name="preco" value="{{ old('preco', $produto->preco) }}" required>

        <input type="text" name="numero páginas" value="{{ old('numero páginas', $biblioteca->detalhe?->numeropáginas) }}" required>

        <input type="text" name="data publicação" value="{{ old('datapublicação', $produto->detalhe?->tamamho) }}" required>

        <input type="number" name="custo" value="{{ old('custo', $produto->detalhe?->custo) }}" required>

        <input type="number" name="preco" value="{{ old('preco', $produto->detalhe?->preco) }}" required>
        
        <input type="number" name="imposto" value="{{ old('imposto', $produto->detalhe?->imposto) }}" required>



        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>