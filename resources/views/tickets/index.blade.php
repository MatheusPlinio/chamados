@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Criar Chamado</h1>
    <form action="{{ route ('ticket.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group w-20 col-md-4 offset-md-4 ">
            <legend>
                Título
                <div class="input-group-prepend">
                    <input type="text" name="titulo" placeholder="Qual seu chamado?" id="title" class="form-control">
                    {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
                </div>
            </legend>

            <legend>
                Solicitação
                <div class="input-group-prepend">
                    <textarea name="solicitacao" placeholder="Qual a Solicitação?" class="form-control"></textarea>
                    {{ $errors->has('solicitacao') ? $errors->first('solicitacao') : '' }}
                </div>
            </legend>

            <legend>
                Data
                <div class="input-group-prepend">
                    <input type="datetime" name="created_at" disabled="disabled" class="form-control" value="<?php echo date('d-m-Y | H:i'); ?>">
                </div>
            </legend>

            <legend>
                Status
                <div class="input-group-prepend">
                    <select name="status" disabled="disabled" class="form-control">
                        <option>Pendente</option>
                    </select>
                </div>
            </legend>

            <legend>
                Prioridade
                <div class="input-group-prepend">
                    <select name="prioridade" class="form-control">
                        <option>-- Selecione uma prioridade--</option>

                        <option value="1">Baixa</option>

                        <option value="2">Média</option>

                        <option value="3">Alta</option>
                    </select>
                    {{ $errors->has('prioridade') ? $errors->first('prioridade') : '' }}
                </div>
            </legend>

            <fieldset>
                <legend>
                    Solicitante
                    <div class="input-group-prepend mb-1">
                        <input type="text" name="solicitante" placeholder="Quem Solicitou?" class="form-control">
                        {{ $errors->has('solicitante') ? $errors->first('solicitante') : '' }}
                    </div>

                    <div class="input-group-prepend mt-1">
                        <input type="text" name="setor" placeholder="Qual o Setor?" class="form-control">
                        {{ $errors->has('setor') ? $errors->first('setor') : '' }}
                    </div>
                </legend>
            </fieldset>

            <div class="button-group-prepend mt-2">
                <button type="submit" class="btn btn-primary">Abrir Chamado</button>
            </div>
        </div>
    </form>
</div>
@endsection