<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Setor</title>
</head>
<style>
    table{
        text-align: center
    }
</style>
<body>
    <h1>Relatório de Editoras</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>N° CORREDOR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($editoras as $editor)
                <tr>
                    <td>{{ $setor->id }}</td>
                    <td>{{ $setor->nome }}</td>
                    <td>{{ $setor->nCorredor }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma BIBLIOTECA encontrada</td> 
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>