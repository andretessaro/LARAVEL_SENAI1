<?php

namespace App\Http\Controllers;

use App\Models\NivelAcesso;
use Exception;
use Illuminate\Http\Request;

class NivelAcessoController extends Controller{

    public function listar(){
        $nivelAcesso = NivelAcesso::all();
        return view('nivel-acesso.listar', compact('nivelAcesso'));
    }

    public function cadastro(){
        return view('nivel-acesso.cadastro');
    }

    public function add(Request $request){

        $request->validate([
            'nivelAcesso' => 'required|string|max:255',
        ]);

        try{
        $nivelAcesso = NivelAcesso::create([
            'nivel_acesso' => $request->nivelAcesso,
        ]);

        return redirect()->back()->with('success','Nivel cadastrado com sucesso!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Erro ao cadastrar o nivel de acesso: ' . $e->getMessage());
            
        }
    }

    public function atualizar($id){
        $nivelAcesso = NivelAcesso::findOrFail($id);
        return view('nivel-acesso.atualizar', compact('nivelAcesso'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nivelAcesso' => 'required|string|max:255',
        ]);

        $nivelDeAcesso = NivelAcesso::findOrfail($id);
        $nivelDeAcesso->nivel_acesso = $request->nivelAcesso;
        $nivelDeAcesso->save(); // salvando no banco de dados

        return redirect()->back()->with('success','Produto atualizado com sucesso!');
    }

        public function deletar(int $id){
            $nivelAcesso = NivelAcesso::findOrFail($id);
            $nivelAcesso->delete();

            return redirect()->route('nivel-acesso.listar')->with('success','Nível de Acesso excluído com sucesso!');
        }
}