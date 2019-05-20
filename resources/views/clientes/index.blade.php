@extends('boilerplate.page')

@section('header-title')
<h1>Clientes</h1>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Clientes</li>
@endsection

@section('content')
<div class="my-2">
    @can('create', \App\Clientes::class)
    <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Cliente</a>
    @endcan
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="clientes-list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Bairro</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
            <tbody>
               @foreach($clientes as $u)
               @php
               $class = '';

           @endphp


           <tr class="{{ $class }}">
            <td>{{ $u->nome }}</td>
            <td>{{ isset($u->celular)?$u->celular:'Não cadastrado' }}</td>
            
            <td>{{ isset($u->endereco->bairro)?$u->endereco->bairro->nome:'Não cadastrado' }}</td>
            <td>
                <div class="table-actions">
                    @can('edit', $u)
                    <a href="{{ route('clientes.edit', ['cliente' => $u]) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                    @endcan


                    @can('destroy', $u)
                    {{ Html::deleteLink('Excluir', route('clientes.destroy', ['cliente' => $u]), ['button_class' => 'btn btn-danger btn-sm confirmable', 'icon' => 'trash']) }}
                    @endcan
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@stop

@section('js')
<script>
    $('#clientes-list').DataTable();
</script>
@stop
