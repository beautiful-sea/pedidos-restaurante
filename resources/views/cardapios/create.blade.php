@extends('boilerplate.page')

@section('header-title')
    <h1>
        Cardápio
        <small>Adicionar Alimento</small>
    </h1>
@stop

@section('header-breadcrumbs')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('cardapios.index') }}">Cardápios</a></li>
    <li class="breadcrumb-item active">Criar</li>
@endsection

@section('content')
    @include('cardapios.form')
@stop