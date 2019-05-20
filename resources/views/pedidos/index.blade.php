@extends('boilerplate.page')

@section('header-title')
    <h1>Pedidos</h1>
@stop

@section('header-breadcrumbs')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Pedidos</li>
@endsection

@section('content')
    <div class="my-2">
        @can('create', \App\Pedidos::class)
            <a href="{{ route('pedidos.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Pedido</a>
        @endcan
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover" id="users-list">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Perfil</th>
                        <th data-orderable="false"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('#users-list').DataTable();
    </script>
@stop
