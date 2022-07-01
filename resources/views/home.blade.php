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
            @foreach( $chamados as $chamado)
            <tr class="table-light">
                <td class="text-center fs-6">{{ $chamado->titulo }}</td>
                <td class="text-center fs-6">{{ $chamado->solicitante }}</td>
                <td class="text-center fs-6">{{ $chamado->updated_at->format('d/m/Y | h:i:s a' )}}</td>
                <td class="text-center fs-6">
                    @if($chamado->status === 0) Pendente
                    @endif
                </td>
                <td class="text-center fs-6">
                    @if($chamado->prioridade === 1 ) Baixo
                    
                    @elseif($chamado->prioridade === 2 ) Média

                    @elseif($chamado->prioridade === 3) Alto
                    @endif
                </td>
                
                <td class="text-center fs-6">{{ $chamado->solicitante }}</td>
                <td class="text-center fs-6">{{ $chamado->setor }}</td>
                <td class="text-center fs-6">
                    <form id="form_{{$chamado->id}}" action="{{ route('ticket.destroy', $chamado->id) }}" method="post">
                        @csrf
                        <a href="#" onclick="document.getElementById('form_{{$chamado->id}}').submit()" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection