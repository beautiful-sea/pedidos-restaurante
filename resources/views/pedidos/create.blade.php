@extends('boilerplate.page')

@section('header-title')
<h1>
	Pedidos
	<small>Novo</small>
</h1>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
<li class="breadcrumb-item active">Criar</li>
@endsection

@section('content')
<div id="app">
	@include('pedidos.form')
</div>
@stop