{{ Form::restForm($cliente, ['id' => 'cliente-form']) }}

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
                {{ Form::bsText('telefone', 'Telefone',['class' => 'tel-ddd-mask']) }}
            </div>

            <div class="col-md-4">
                {{ Form::bsText('celular', 'Celular',['class' => 'tel-ddd-mask']) }}
            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Endereço</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-4">
                {{ Form::bsText('logradouro', 'Logradouro',['default'=>isset($cliente->endereco)? $cliente->endereco->logradouro:''])}}
            </div>

             <div class="col-md-4">
                {{ Form::bsText('numero', 'Número',['default'=>isset($cliente->endereco)? $cliente->endereco->numero:'']) }}
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="bairros">Bairro</label>
                    <select name="bairros_id" id="bairro" class="form-control select-2">
                        <option value="">Selecione uma opção</option>
                        @foreach(\App\Bairros::all() as $bairro)
                        <option value="{{$bairro->id}}" {{(isset($cliente->endereco->bairro) && ($cliente->endereco->bairro->id == $bairro->id))?'selected':''}}>{{$bairro->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                {{ Form::bsText('referencia', 'Referência',['default'=>isset($cliente->endereco)? $cliente->endereco->referencia:'']) }}
            </div>

             <div class="col-md-4">
                {{ Form::bsText('complemento', 'Complemento',['default'=>isset($cliente->endereco)? $cliente->endereco->referencia:'']) }}
            </div>
        </div>

    </div>
</div>

{{ Form::bsSubmit('Salvar') }}

{{ Form::close() }}

@section('js')
<script>
    $('#cliente-form').validate({
        rules: {
            'name': 'required',
            'password': 'required',
            'confirm_password': {
                'required': true,
                'equalTo': '#password'
            },
            'role': 'required',
            'confirm_new_password': {
                'required': () => $('#new_password').val() !== '',
                'equalTo': '#new_password'
            }
        },
        messages: {
            'email': {
                'remote': 'Este e-mail já está sendo utilizado'
            },
            'confirm_password': {
                'equalTo': 'Deve ser igual à Senha'
            },
            'confirm_new_password': {
                'equalTo': 'Deve ser igual à Nova Senha'
            }
        }
    });
</script>
@endsection
