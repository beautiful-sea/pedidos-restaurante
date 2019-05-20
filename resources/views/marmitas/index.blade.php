@extends('boilerplate.page')

@section('header-title')
<h1>Marmitex</h1>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Marmitex</li>
@endsection

@section('content')
<div class="my-2">
    @can('create', \App\Clientes::class)
    <a href="{{ route('marmitas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Marmitex</a>
    @endcan
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="marmitex-list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
            <tbody>
           @foreach($marmitas as $u)
               @php
                    $class = '';

                @endphp


           <tr class="{{ $class }}">
            <td>{{ $u->nome }}</td>
            <td>{{ $u->material }}</td>
            <td>R$ {{$u->valor_unitario}},00</td>
            <td>
                <div class="table-actions">
                    @can('edit', $u)
                    <a href="{{ route('marmitas.edit', ['marmitas' => $u]) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                    @endcan


                    @can('destroy', $u)
                    {{ Html::deleteLink('Excluir', route('marmitas.destroy', ['marmitas' => $u]), ['button_class' => 'btn btn-danger btn-sm confirmable', 'icon' => 'trash']) }}
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
    $('#marmitex-list').DataTable();
</script>
@stop
