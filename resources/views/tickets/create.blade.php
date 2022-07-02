@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Criar Chamado</h1>
    <form action="{{ route ('tickets.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group w-20 col-md-4 offset-md-4 ">

            <label for="titulo">Título</label>
            <input type="text" name="titulo" placeholder="Qual seu chamado?" id="titulo" class="form-control mb-1 @error('titulo') is-invalid @enderror">
            @error('titulo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="solicitacao">Solicitação</label>
            <textarea name="solicitacao" placeholder="Qual a Solicitação?" id="solicitacao" class="form-control mb-1 @error('solicitacao') is-invalid @enderror"></textarea>
            @error('solicitacao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="created_at">Data da Solicitação</label>
            <input type="datetime" name="created_at" disabled="disabled" class="form-control mb-1" value="{{ now()->format('d/m/Y | H:i') }}">

            <label for="status">Status</label>
            <select name="status" disabled="disabled" class="form-control mb-1">
                <option>Pendente</option>
            </select>

            <label for="prioridade">Prioridade</label>
            <select name="prioridade" class="form-control mb-1" id="prioridade">
                <option>-- Selecione uma prioridade--</option>
                <option value="1">Baixa</option>
                <option value="2">Média</option>
                <option value="3">Alta</option>
            </select>

            <label for="solicitante">Solicitante</label>
            <input type="text" name="solicitante" placeholder="Quem Solicitou?" id="solicitante" class="form-control mb-1 @error('solicitante') is-invalid @enderror">
            @error('solicitante')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="setor">Setor</label>
            <input type="text" name="setor" placeholder="Qual o Setor?" class="form-control mb-1 @error('setor') is-invalid @enderror" id="setor">
            @error('setor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <button type="submit" class="btn btn-primary mb-2">Abrir Chamado</button>
        </div>
    </form>
</div>
@endsection