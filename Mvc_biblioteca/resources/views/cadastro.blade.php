
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da Biblioteca</title>
</head>
<body>
    <h1>Cadastro da Biblioteca</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{ route('biblioteca.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Biblioteca..." require value="{{old('nome')}}">
        <br><br>

        <label for="qntd">Autor:</label>
        <input type="text" name="autor" id="autor" placeholder="Quantidade..." require value="{{old('autor')}}">
        <br><br>

         <label for="qntd">Descrição:</label>
        <input type="text" name="descrição" id="descrição" placeholder="Descrição..." require value="{{old('descrição')}}">
        <br><br>

         <label for="qntd">Numero Páginas:</label>
        <input type="text" name="numero páginas" id="numero páginas" placeholder="Número Páginas..." require value="{{old('numero páginas')}}">
        <br><br>

         <label for="qntd">data publicação :</label>
        <input type="text" name="data publicação" id="data publicação" placeholder="Data Publicação..." require value="{{old('Data Publicação')}}">
        <br><br>

        <label for="qntd">custo :</label>
        <input type="text" name="custo" id="custo" placeholder="Custo..." require value="{{old('Custo')}}">
        <br><br>

        <label for="qntd">Preço:</label>
        <input type="text" name="preco" id="preco" placeholder="Preço..." require value="{{old('preco')}}">
        <br><br>

        <label for="descricao">Imposto</label>
        <input type="textarea" name="imposto" id="imposto" placeholder="Imposto..." require value="{{old('imposto')}}">
        <br><br>

         <label for="editora_id">Editora:</label>
        <select name="editora_id" id="editora_id" required>
            <option value="" disabled selected>Selecione uma Editora</option>

            @foreach ($editoras as $editoras)
                <option value="{{ $editora->id }}">
                    Editora - {{ $editora->nome }} - N° {{ $editora->nCorredor }}
                </option>
            @endforeach
        </select>
        
        <input type="submit" value="Cadastrar">
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