@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr class="table-secondary">
                <th class="text-center fs-5">Chamado</th>
                <th class="text-center fs-5">Prioridade</th>
                <th class="text-center fs-5">Status</th>
                <th class="text-center fs-5">Solicitação</th>
                <th class="text-center fs-5">Nome do Solicitante</th>
                <th class="text-center fs-5">Setor</th>
                <th class="text-center fs-5">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $calls as $call)
            <tr class="table-light">
                <td class="text-center fs-5">{{ $call->title }}</td>
                <td class="text-center fs-5">
                    @if($call->priority === 1 ) Baixo
                    @endif

                    @if($call->priority === 2 ) Média
                    @endif

                    @if($call->priority === 3) Alto
                    @endif
                </td>
                <td class="text-center fs-5">
                    @if($call->status === 0) Pendente
                    @endif
                </td>
                <td class="text-center fs-5">{{ $call->request }}</td>
                <td class="text-center fs-5">{{ $call->solicitor }}</td>
                <td class="text-center fs-5">{{ $call->sector }}</td>
                <td class="text-center fs-5">{{ $call->updated_at}}</td>
                <td class="text-center fs-5">
                    <form id="form_{{$call->id}}" action="{{ route('ticket.destroy', $call->id) }}" method="post">
                        @csrf
                        <a href="#" onclick="document.getElementById('form_{{$call->id}}').submit()" class="btn btn-danger">Excluir</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route ('ticket.index') }}" class="btn btn-primary">Cadastrar Chamado</a>
</div>
@endsection