@extends('boilerplate.page')

@section('header-title')
    <h1>
        Clientes
        <small>Criar</small>
    </h1>
@stop

@section('header-breadcrumbs')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Clientes</a></li>
    <li class="breadcrumb-item active">Criar</li>
@endsection

@section('content')
    @include('clientes.form')
@stop