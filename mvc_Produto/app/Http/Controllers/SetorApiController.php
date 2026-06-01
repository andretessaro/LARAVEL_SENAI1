<?php
// estou no SetorApiController.php
namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
    }

    public function addApi(Request $request){

    try{
        $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
        ]);

        $setor = Setores::create([
            'nome' => $request->nome,
            'num_setor' => $request->num_setor
        ]);

        return response()->json([
            'sucess' => true,
            'message' => 'Setor Criado',
            'setor' => $setor
            ], 201);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'sucess' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
            }
    }
    
    public function updateApi(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
        ]);

        $produto = Setores::findOrFail($id); // buscar aluno para ser atualizado

        $setor->nome = $request->nome; // atualizando o campo nome
        $setor->num_setor = $request->num_setor; // atualizando o campo quantidade

        $produto->save(); // salvando no banco de dados(fazendo update)

       return response()->json([
        'message' => "Setor atualizado!",
        'setor' => $setor
       ], 200);
    }

     public function deletarApi($id){
        $setor = Setores::findOrFail($id); // buscar o setor
        //  para depois deletar
        $setor->delete(); // faz o delete no banco de dados

        return response()->json([
        'message' => "Setor Deletado com Sucesso!",
        ], 200);
    }

}
