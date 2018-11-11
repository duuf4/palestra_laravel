@extends('master')

@section('title', 'Alunos')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">RA</th>
        <th scope="col"><a  href="{{url('alunos/create')}}">Adicionar</a></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($alunos as $aluno)
        <tr>
          <td>{{$aluno->nome}}k</td>
          <td>{{$aluno->ra}}</td>
          <td>
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary">Editar</button>
                <form action="{{route('delete', ['aluno' => $aluno])}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
              </div>
          </td>
        </tr>
      @empty
        <tr colspan='3'>
            <td>Não há alunos cadastrados.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection