{{ Form::restForm($marmitas, ['id' => 'cliente-form','route_prefix' => 'marmitas']) }}

<div class="card">

    <div class="card-header">
        <h3>Dados</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-4">
                {{ Form::bsText('nome', 'Nome') }}
            </div>

            <div class="col-md-4">
                {{ Form::bsText('material', 'Material') }}
            </div>

            <div class="col-md-4">
                {{ Form::bsText('tamanho', 'Tamanho') }}
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                {{ Form::bsText('marca', 'Marca') }}
            </div>

            <div class="col-md-4">
                {{ Form::bsText('valor_unitario', 'Preço') }}
            </div>

        </div>

    </div>
</div>



{{ Form::bsSubmit('Salvar') }}

{{ Form::close() }}

@section('js')
<script>
</script>
@endsection
