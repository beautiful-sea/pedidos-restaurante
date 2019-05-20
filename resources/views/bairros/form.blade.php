{{ Form::restForm($bairro, ['id' => 'cliente-form']) }}

<div class="card">

    <div class="card-header">
        <h3>Dados</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                {{ Form::bsText('nome', 'Nome') }}
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
