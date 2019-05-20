@extends('boilerplate.page')

@section('header-title')
    <h1>
        Bairro
        <small>Editar</small>
    </h1>
@stop

@section('header-breadcrumbs')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('bairros.index') }}">Bairros</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')
    @include('bairros.form')
@stop