@extends('boilerplate.page')

@section('header-title')
<h1>Cardápios</h1>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Cardápios</li>
@endsection

@section('content')
<div class="my-2">
    @can('create', \App\Cardapios::class)
    <a href="{{ route('cardapios.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Alimento</a>
    @endcan
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="cardapios-list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
            <tbody>
           @foreach($cardapios as $u)
               @php
                    $class = '';

                @endphp


           <tr class="{{ $class }}">
            <td>{{ $u->nome }}</td>
            <td> <span class="badge badge-{{ ($u->selected == 1)?'success':'danger' }}">{{ ($u->selected == 1)?'Padrão':'Não Padrão' }}</span> </td>
            <td>
                <div class="table-actions">
                    @can('edit', $u)
                    <a href="{{ route('cardapios.edit', ['cardapios' => $u]) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                    @endcan


                    @can('destroy', $u)
                    {{ Html::deleteLink('Excluir', route('cardapios.destroy', ['cardapios' => $u]), ['button_class' => 'btn btn-danger btn-sm confirmable', 'icon' => 'trash']) }}
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
    $('#cardapios-list').DataTable();
</script>
@stop
