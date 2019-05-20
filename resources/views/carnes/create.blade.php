@extends('boilerplate.page')

@section('header-title')
    <h1>
        Carne
        <small>Adicionar</small>
    </h1>
@stop

@section('header-breadcrumbs')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('carnes.index') }}">Carnes</a></li>
    <li class="breadcrumb-item active">Criar</li>
@endsection

@section('content')
    @include('carnes.form')
@stop