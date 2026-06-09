<?php
// estou no SetorApiController.php
namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(Request $request){
        try{
            $query = Produtos::query();

            if($request->filled('nome')){
                $query->where('nome', 'like', '%'.$request->produto .'%');
            }
           
            if($request->filled('num_produto')){
                $query->where('num_produto', $request->num_produto);
            }

            $produtos = $query->get();

            return response()->json([
                'success' => true,
                'data' => $produtos
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    
    public function addApi(Request $request){

        try{
            $request->validate([
                'nome' => 'required|string|max:255',
                'num_setor' => 'required|numeric|max:255',
                // para poder ser nulo ou existir na tabela setores
            ]);

            $produto = Produto::create([
                'nome' => $request->nome,
                'tipo de materia' => $request->tipomatéria,
                'especificações' => $request->especificações,
                'quantidade' => $request->quantidade,
                'data fabricação' => $request->datafabricação,
                'preço de venda'=> $request->preçovenda
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Produto Criado',
                'produto' => $produto
            ], 200);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }

    }
    
    public function updateApi(Request $request, $id){
        try{
            $request->validate([
                'nome' => 'required|string|max:255',
                'tipo de materia' => 'required|string|max:255',
                'especificações' => 'required|string|max:255',
                'quantidade' => 'required|string|max:255',
                'datafabricação' => 'required|string|max:255',
                'preçodevenda' => 'required|string|max:255'
            ]);

            $produto = Produto::findOrFail($id); 

            $produto->nome = $request->nome;
           $produto->tipodemateria = $request->tipodemateria;
           $produto->especificações = $request->especificações;
           $produto->quantidade = $request->quantidade;
           $produto->datafabricação = $request->datafabricação;
           $produto->preçodevenda = $request->preçoedefenda; 

            $Produto->save(); // salvando no banco de dados(fazendo update)

            return response()->json([
                'message' => "Produto atualizado!",
                'produto' => $produto
            ], 200);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id){
        try{
            $produto = Produtos::findOrFail($id); // buscar o setor para depois deletar
            $produto->delete(); // faz o delete no banco de dados

            return response()->json([
                'message' => "Produto Deletado com Sucesso!",
            ], 200);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}