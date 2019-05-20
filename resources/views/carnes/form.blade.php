{{ Form::restForm($carne, ['id' => 'carnes-form']) }}

<div class="card">

    <div class="card-header">
        <h3>Dados</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                {{ Form::bsText('nome', 'Nome da Carne') }}
            </div>
            <div class="col-md-12">
                {{ Form::bsText('valor_unitario', 'Valor Unitário',['class'=>'money-mask']) }}
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
