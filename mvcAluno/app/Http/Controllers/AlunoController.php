<?php

namespace App\http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get();
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success','Aluno Cadastrado com sucesso!');
    
    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id); //Busca o aluno pelo id
        // select * from alunos where id = $id
        return view('atualizar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:, email, $id"
        ]);

        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->email= $request->email;

        $aluno->save();
        return redirect()->back()->with('sucess','Aluno atualizado com sucesso');
    }      

}