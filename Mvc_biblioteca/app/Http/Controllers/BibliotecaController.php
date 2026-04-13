<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use App\Models\Editora;
use App\Models\DetalheBiblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller{

    public function listar(){
        $bibliotecas = Biblioteca::with(['setor','detalhe'])->get();
        return view('listar', compact('bibliotecas'));
    }

    public function create(){
        $editoras = Editora::all();
        return view('cadastro', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numero páginas' => 'required|string|max:255',
            'data publicação' => 'required|string|max:255',
            'editora_id' => 'required|exists:setores,id',
            'custo' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
            'imposto' => 'required|string|max:255'

        ]);

        $detalhe = DetalheBiblioteca::create([
            'custo' => $request->custo,
            'preco' => $request->preço,
            'imposto' => $request->imposto,
        ]);

        Biblioteca::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->preco,
            'numero páginas' => $request->numeropáginas,
            'detalhes_id' => $detalhe->id
        ]);

        return redirect()->back()->with('success','Biblioteca cadastrada com sucesso!');
    }

    public function atualizar($id){
        $biblioteca = Biblioteca::with('detalhe')->findOrFail($id);
        $editoras = Editora::all();
        return view('atualizar', compact('biblioteca','editoras'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numero páginas' => 'required|string|max:255',
            'data publicação' => 'required|string|max:255',
            'custo' => 'required|numeric|max:255',
            'preco' => 'required|numeric|max:255',
            'imposto' => 'required|numeric|max:255'
        ]);

        $biblioteca = Biblioteca::findOrFail($id);

        $biblioteca->update([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'preco' => $request->preco,
            'numero páginas' => $request->numeropáginas,
            'data publicação' => $request->datapublicação,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'imposto' => $request->imposto,
        ]);

        $produto->detalhe->update([
            'descricao' => $request->descricao,
            'autor' => $request->tamanho,
            'numero páginas ' => $request->numeropáginas,
        ]);

        return redirect()->back()->with('success','Biblioteca atualizado com sucesso!');
    }

    public function deletar($id){
        $biblioteca = Biblioteca::findOrFail($id);
        $biblioteca->delete();

        return redirect()->route('biblioteca.listar')->with('success','Biblioteca excluída com sucesso!');
    }
}