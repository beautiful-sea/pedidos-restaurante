@extends('boilerplate.page')

@section('header-title')
<h1>Carnes</h1>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Carnes</li>
@endsection

@section('content')
<div class="my-2">
    @can('create', \App\Carnes::class)
    <a href="{{ route('carnes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Carne</a>
    @endcan
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="carnes-list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor Unitário</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
            <tbody>
           @foreach($carnes as $u)
               @php
                    $class = '';
                @endphp


           <tr class="{{ $class }}">
            <td>{{ $u->nome }}</td>
            <td>{{ \App\Http\Controllers\Controller::paraReal($u->valor_unitario) }}</td>
            <td>
                <div class="table-actions">
                    @can('edit', $u)
                    <a href="{{ route('carnes.edit', ['carnes' => $u]) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                    @endcan


                    @can('destroy', $u)
                    {{ Html::deleteLink('Excluir', route('carnes.destroy', ['carnes' => $u]), ['button_class' => 'btn btn-danger btn-sm confirmable', 'icon' => 'trash']) }}
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
    $('#carnes-list').DataTable();
</script>
@stop
