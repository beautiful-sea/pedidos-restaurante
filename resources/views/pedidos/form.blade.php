{{ Form::restForm($pedido, ['id' => 'pedido-form']) }}

<div class="col-md-12">
    <div class="row">

        <pedido-cliente :clientes='{{$clientes}}'></pedido-cliente>
        <pedido :clientes='{{$clientes}}' :carnes='{{$carnes}}' :cardapios='{{$cardapios}}' :marmitexs='{{$marmitex}}'></pedido>

    </div>
</div>
{{ Form::bsSubmit('Salvar') }}

{{ Form::close() }}

@section('js')
<script>
</script>
@endsection
