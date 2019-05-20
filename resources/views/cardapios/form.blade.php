{{ Form::restForm($cardapio, ['id' => 'cardapios-form']) }}

<div class="card">

    <div class="card-header">
        <h3>Dados</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                {{ Form::bsText('nome', 'Nome do Alimento') }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Alimento Padrão?</label>
            </div>
            <div class="col-md-12">
                {{ Form::bsRadio('selected', 'Sim' ,1) }}
            </div>

            <div class="col-md-12">
                {{ Form::bsRadio('selected', 'Não' ,0) }}
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
