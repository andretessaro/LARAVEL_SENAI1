<?php

namespace App\Http\Controllers;

use App\Models\NivelAcesso;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller{

     public function listar(){

         $usuarios = Usuarios::with('nivelAcesso')->get();
         return view('usuarios.listar', compact('usuarios'));
     }

    public function cadastro()
    {
        $nivelAcesso = NivelAcesso::all();

        return view('usuarios.cadastro', compact($nivelAcesso));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required',
            'telefone' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'nivelAcessoId' => 'required'
        ]);

        try{
            Usuarios::create([
            'nome' => $request->nivelAcesso,
            'data_nascimento' => $request->dataNascimento,
            'telefone' => $request->telefone,
            'nivel_acesso_id' => $request->nivelAcessoId,
            'cpf' => $request->cpf
        ]);

            return redirect()->back()->with('success','Usuário cadastrado com sucesso!');
        } catch(Exception $e){
            return redirect()->back()->with('error','Erro ao cadastrar o nivel de acesso: ' . $e->getMessage());
            
        }
    }

     public function atualizar($id){
         $usuarios = Usuarios::findOrFail($id);
         $nivelAcesso = NivelAcesso::all();
         return view('usuarios.atualizar', compact('usuarios'));
     }

    // public function update(Request $request, $id){
    //     $request->validate([
    //         'nivelAcesso' => 'required|string|max:255',
    //     ]);

    //     $nivelDeAcesso = NivelAcesso::findOrfail($id);
    //     $nivelDeAcesso->nivel_acesso = $request->nivelAcesso;
    //     $nivelDeAcesso->save(); // salvando no banco de dados

    //     return redirect()->back()->with('success','Produto atualizado com sucesso!');
    // }

         public function deletar(int $id){
             $usuarios = Usuarios::findOrFail($id);
             $usuarios->delete();

             return redirect()->route('usuarios.listar')->with('success','Usuário excluido com sucesso!');
     }
}