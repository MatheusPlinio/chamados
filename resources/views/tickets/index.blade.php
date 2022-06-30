@extends('layouts.app')

@section('content')
<div class="container ">
    <form action="{{ route ('ticket.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group w-25 col-md-4 offset-md-5 ">
            <div class="input-group-prepend m-2 ">
                <span class="input-group-text" id="basic-addon1">Chamado</span>
                <input type="text" name="title" placeholder="Qual seu chamado?" id="title"  class="form-control">
                {{ $errors->has('title') ? $errors->first('title') : '' }}
            </div>

            <div class="input-group-prepend m-2">
                <span class="input-group-text" id="basic-addon1">Solicitação</span>
                <input type="text" name="request" placeholder="Qual a Solicitação?" class="form-control">
                {{ $errors->has('request') ? $errors->first('request') : '' }}
            </div>

            <div class="input-group-prepend m-2">
                <span class="input-group-text" id="basic-addon1">Colaborador</span>
                <input type="text" name="solicitor" placeholder="Quem Solicitou?" class="form-control">
                {{ $errors->has('solicitor') ? $errors->first('solicitor') : '' }}
            </div>

            <div class="input-group-prepend m-2">
                <span class="input-group-text" id="basic-addon1">Setor</span>
                <input type="text" name="sector" placeholder="Setor" class="form-control">
                {{ $errors->has('sector') ? $errors->first('sector') : '' }}
            </div>

            <div class="input-group-prepend m-2">
                <span class="input-group-text" id="basic-addon1">Data</span>
                <input type="date" name="updated_at" disabled="disabled"  class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="input-group-prepend m-2">
                <span class="input-group-text" id="basic-addon1" class="form-control">Prioridade</span>
                <select name="priority">
                <option>-- Selecione uma prioridade--</option>

                    <option value="1">Baixa</option>

                    <option value="2">Média</option>

                    <option value="3">Alta</option>
                </select>
                {{ $errors->has('priority') ? $errors->first('priority') : '' }}
            </div>

            <div class="input-group-prepend m-2">
                <span class="input-group-text" id="basic-addon1" class="form-control">Status</span>
                <select name="status" disabled="disabled">
                    <option>Pendente</option>
                </select>
            </div>
            <div class="button-group-prepend m2">
                <button type="submit" class="btn btn-primary m-2">Abrir Chamado</button>
            </div>
        </div>
    </form>
</div>
@endsection