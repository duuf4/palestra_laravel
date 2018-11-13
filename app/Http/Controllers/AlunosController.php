<?php

namespace App\Http\Controllers;

use App\Alunos;
use Illuminate\Http\Request;
use Validator;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Alunos::all();

        return view('alunos.index', ['alunos' => $alunos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nome' => 'required|string',
            'ra' => 'required|unique:alunos',
        ]);

        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        Alunos::create([
            'nome' => $request->nome,
            'ra' => $request->ra,
        ]);

        return redirect('alunos')->with(['success' => 'Aluno adicionado com sucesso.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alunos  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alunos $aluno)
    {
        return view('alunos.edit', ['aluno' => $aluno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alunos  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alunos $aluno)
    {
        $aluno->nome = $request->nome;
        $aluno->ra = $request->ra;

        $aluno->save();

        return redirect('alunos')->with(['success' => 'Aluno atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alunos  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alunos $aluno)
    {
        $aluno->delete();

        return redirect('alunos')->with(['success' => 'Aluno removido com sucesso.']);
    }
}
