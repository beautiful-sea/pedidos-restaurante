@extends('boilerplate.page')

@section('header-title')
<h1>Bairros</h1>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Bairros</li>
@endsection

@section('content')
<div class="my-2">
    @can('create', \App\Clientes::class)
    <a href="{{ route('bairros.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Bairro</a>
    @endcan
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="bairros-list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
            <tbody>
           @foreach($bairros as $u)
               @php
                    $class = '';

                @endphp


           <tr class="{{ $class }}">
            <td>{{ $u->nome }}</td>
            <td>
                <div class="table-actions">
                    @can('edit', $u)
                    <a href="{{ route('bairros.edit', ['bairro' => $u]) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                    @endcan


                    @can('destroy', $u)
                    {{ Html::deleteLink('Excluir', route('bairros.destroy', ['bairro' => $u]), ['button_class' => 'btn btn-danger btn-sm confirmable', 'icon' => 'trash']) }}
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
    $('#bairros-list').DataTable();
</script>
@stop
