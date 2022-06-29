@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route ('ticket.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Qual seu chamado?">
        {{ $errors->has('title') ? $errors->first('title') : '' }}

        <input type="text" name="request" placeholder="Qual a Solicitação?">
        {{ $errors->has('request') ? $errors->first('request') : '' }}

        <input type="text" name="solicitor" placeholder="Quem Solicitou?">
        {{ $errors->has('solicitor') ? $errors->first('solicitor') : '' }}

        <input type="text" name="sector" placeholder="Setor">
        {{ $errors->has('sector') ? $errors->first('sector') : '' }}
        <select name="priority">
            <option value="1">Baixa</option>

            <option value="2">Média</option>

            <option value="3">Alta</option>
        </select>
        {{ $errors->has('priority') ? $errors->first('priority') : '' }}
        <select name="status">
            <option value="1">Pendente</option>
        </select>

        <button type="submit">Abrir Chamado</button>
    </form>
</div>
@endsection