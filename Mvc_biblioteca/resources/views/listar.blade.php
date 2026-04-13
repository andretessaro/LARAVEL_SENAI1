<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório das Bibliotecas/title>
</head>
<style>
    table{
        text-align: center
    }
</style>
<body>
    <h1>Relatório de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>AUTOR</th>
                <th>DESCRIÇÃO</th>
                <th>NUMEROS PÁGINAS</th>
                <th>DATA PUBLICAÇÃO</th>
                <th>ID EDITORA</th>
                <th>EDITORA</th>
                <th>CUSTO</th>
                <th>PRECO</th>
                <th>IMPOSTO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bibliotecas as $bibliotecas);
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->autor }}</td>
                    <td>{{ $produto->detalhe->descricao ?? '' }}</td>
                    <td>{{ $produto->detalhe->numeropáginas ?? '' }}</td>
                    <td>{{ $produto->detalhe->datapublicação ?? '' }}</td>
                    <td>{{ $produto->editora?->id }}</td>
                    <td>{{ $produto->editora?->nome }}</td>
                    <td>{{ $produto->editora?->nCorredor }}</td>
                    <td>{{ $produto->custo }}</td>
                    <td>{{ $produto->preco }}</td>
                     <td>{{ $produto->imposto }}</td>
                    <td>
                        <a href="{{route('biblioteca.atualizar', $biblioteca->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('biblioteca.deletar', $biblioteca->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">Nenhuma BIBLIOTECA encontrado</td> 
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>