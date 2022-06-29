@extends('layouts.app')

@section('content')
<div class="container">
    <button type="submit"><a href="{{ route ('ticket.index') }}">Cadastrar Chamado</a></button>
    <table>
        <thead>
            <tr>
                <th>Chamado</th>
                <th>Prioridade</th>
                <th>Status</th>
                <th>Solicitação</th>
                <th>Nome do Solicitante</th>
                <th>Setor</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $calls as $call)
            <tr>
                <td>{{ $call->title }}</td>
                <td>
                    @if($call->priority === 1 ) Baixo
                    @endif

                    @if($call->priority === 2 ) Média
                    @endif

                    @if($call->priority === 3) Alto
                    @endif
                </td>
                <td>
                    @if($call->status === 0) Pendente 
                    @endif
                </td>
                <td>{{ $call->request }}</td>
                <td>{{ $call->sector }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection