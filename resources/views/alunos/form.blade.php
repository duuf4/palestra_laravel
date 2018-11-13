@extends('master')

@section('title', 'Criar Alunos')

@section('content')
  <h1>Adicionar Alunos</h1>
  @if ($errors)
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        <strong>{{$error}}</strong>
      </div>
      @endforeach
  @endif
  <form action="{{url('alunos')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" class="form-control" placeholder="Digite o nome do aluno">
    </div>
    <div class="form-group">
      <label for="ra">RA</label>
      <input type="text" name="ra" class="form-control" placeholder="Digite o ra">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection