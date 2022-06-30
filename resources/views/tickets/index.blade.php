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
                    <input type="text" name="title" placeholder="Qual seu chamado?" id="title" class="form-control">
                    {{ $errors->has('title') ? $errors->first('title') : '' }}
                </div>
            </legend>

            <legend>
                Solicitação
                <div class="input-group-prepend">
                    <textarea name="request" placeholder="Qual a Solicitação?" class="form-control"></textarea>
                    {{ $errors->has('request') ? $errors->first('request') : '' }}
                </div>
            </legend>

            <legend>
                Data
                <div class="input-group-prepend">
                    <input type="datetime" name="updated_at" disabled="disabled" class="form-control" value="<?php echo date('Y-m-d | h:i:s a'); ?>">
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
                <div class="input-group-prepend">
                    <select name="priority" class="form-control">
                        <option>-- Selecione uma prioridade--</option>

                        <option value="1">Baixa</option>

                        <option value="2">Média</option>

                        <option value="3">Alta</option>
                    </select>
                    {{ $errors->has('priority') ? $errors->first('priority') : '' }}
                </div>
            </legend>

            <fieldset>
                <legend>
                    Solicitante
                    <div class="input-group-prepend mb-1">
                        <input type="text" name="solicitor" placeholder="Quem Solicitou?" class="form-control">
                        {{ $errors->has('solicitor') ? $errors->first('solicitor') : '' }}
                    </div>

                    <div class="input-group-prepend mt-1">
                        <input type="text" name="sector" placeholder="Qual o Setor?" class="form-control">
                        {{ $errors->has('sector') ? $errors->first('sector') : '' }}
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