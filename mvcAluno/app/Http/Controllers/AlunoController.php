<?php

namespace App\http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
       // $query = Aluno::query();
        //$alunos = $query->get();
        //return view('listar', compact('alunos'));

        $alunos = Alunos::with('turma')->get();
        // SELECT * FROM alunos join turmas on turma_id = turmas.id;
        // @dd($alunos->toArray());
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'turma_id' => 'nullable|exists:turmas,id' // para poder ser nulo ou existir na tabela turmas
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma_id' => $request->turma_id
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
    
    public function deletar($id){
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('aluno.listar')->with('sucess','Aluno excluido com sucesso');
    
    }

}