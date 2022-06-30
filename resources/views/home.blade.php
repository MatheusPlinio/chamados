@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route ('ticket.index') }}" class="btn btn-primary mb-2">Novo Chamado <i class="fa-solid fa-circle-plus"></i></a>
    <table class="table table-bordered">
        <thead>
            <tr class="table-secondary">
                <th class="text-center fs-6">Título</th>
                <th class="text-center fs-6">Solicitação</th>
                <th class="text-center fs-6">Data & Hora</th>
                <th class="text-center fs-6">Status</th>
                <th class="text-center fs-6">Prioridade</th>
                <th class="text-center fs-6">Nome do Solicitante</th>
                <th class="text-center fs-6">Setor</th>
                <th class="text-center fs-6">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $calls as $call)
            <tr class="table-light">
                <td class="text-center fs-6">{{ $call->title }}</td>
                <td class="text-center fs-6">{{ $call->request }}</td>
                <td class="text-center fs-6">{{ $call->updated_at->format('d/m/Y | h:i:s a' )}}</td>
                <td class="text-center fs-6">
                    @if($call->status === 0) Pendente
                    @endif
                </td>
                <td class="text-center fs-6">
                    @if($call->priority === 1 ) Baixo
                    
                    @elseif($call->priority === 2 ) Média

                    @elseif($call->priority === 3) Alto
                    @endif
                </td>
                
                <td class="text-center fs-6">{{ $call->solicitor }}</td>
                <td class="text-center fs-6">{{ $call->sector }}</td>
                <td class="text-center fs-6">
                    <form id="form_{{$call->id}}" action="{{ route('ticket.destroy', $call->id) }}" method="post">
                        @csrf
                        <a href="#" onclick="document.getElementById('form_{{$call->id}}').submit()" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection